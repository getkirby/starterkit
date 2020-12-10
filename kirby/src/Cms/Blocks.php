<?php

namespace Kirby\Cms;

use Exception;
use Kirby\Data\Json;
use Kirby\Data\Yaml;
use Kirby\Parsley\Parsley;
use Kirby\Parsley\Schema\Blocks as BlockSchema;
use Kirby\Toolkit\A;
use Kirby\Toolkit\Str;
use Throwable;

/**
 * A collection of blocks
 *
 * @package   Kirby Cms
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier GmbH
 * @license   https://getkirby.com/license
 */
class Blocks extends Items
{
    const ITEM_CLASS = '\Kirby\Cms\Block';

    /**
     * Return HTML when the collection is
     * converted to a string
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->toHtml();
    }

    /**
     * Converts the blocks to HTML and then
     * uses the Str::excerpt method to create
     * a non-formatted, shortened excerpt from it
     *
     * @param mixed ...$args
     * @return string
     */
    public function excerpt(...$args)
    {
        return Str::excerpt($this->toHtml(), ...$args);
    }

    /**
     * Wrapper around the factory to
     * catch blocks from layouts
     *
     * @param array $items
     * @param array $params
     * @return \Kirby\Cms\Blocks
     */
    public static function factory(array $blocks = null, array $params = [])
    {
        $blocks = static::extractFromLayouts($blocks);
        $blocks = BlockConverter::editorBlocks($blocks);

        return parent::factory($blocks, $params);
    }

    /**
     * Pull out blocks from layouts
     *
     * @param array $input
     * @return array
     */
    protected static function extractFromLayouts(array $input): array
    {
        if (empty($input) === true) {
            return [];
        }

        // no layouts
        if (array_key_exists('columns', $input[0]) === false) {
            return $input;
        }

        $blocks = [];

        foreach ($input as $layout) {
            foreach (($layout['columns'] ?? []) as $column) {
                foreach (($column['blocks'] ?? []) as $block) {
                    $blocks[] = $block;
                }
            }
        }

        return $blocks;
    }

    /**
     * Parse and sanitize various block formats
     *
     * @param array|string $input
     * @return array
     */
    public static function parse($input): array
    {
        if (empty($input) === false && is_array($input) === false) {
            try {
                $input = Json::decode((string)$input);
            } catch (Throwable $e) {
                try {
                    // try to import the old YAML format
                    $yaml  = Yaml::decode((string)$input);
                    $first = A::first($yaml);

                    // check for valid yaml
                    if (empty($yaml) === true || (isset($first['_key']) === false && isset($first['type']) === false)) {
                        throw new Exception('Invalid YAML');
                    } else {
                        $input = $yaml;
                    }
                } catch (Throwable $e) {
                    $parser = new Parsley((string)$input, new BlockSchema());
                    $input  = $parser->blocks();
                }
            }
        }

        if (empty($input) === true) {
            return [];
        }

        return $input;
    }

    /**
     * Convert all blocks to HTML
     *
     * @return string
     */
    public function toHtml(): string
    {
        $html = [];

        foreach ($this->data as $block) {
            $html[] = $block->toHtml();
        }

        return implode($html);
    }
}
