<?php

namespace App\Tool;

class TranslationCrawler
{
    public function get_files()
    {
        $directory = new \RecursiveDirectoryIterator(base_path());

        $iterator = new \RecursiveIteratorIterator($directory);

        $files = [];

        foreach ($iterator as $info)
        {
            $matches = [];

            if (preg_match('/'.str_replace('/', '\/', base_path('vendor/')).'/', $info->getPathname()))
                continue;

            if (preg_match('/'.str_replace('/', '\/', base_path('storage/')).'/', $info->getPathname()))
                continue;

            if (preg_match('/'.str_replace('/', '\/', base_path('node_modules/')).'/', $info->getPathname()))
                continue;

            if (preg_match('/'.str_replace('/', '\/', base_path('tests/')).'/', $info->getPathname()))
                continue;

            if (preg_match('/'.str_replace('/', '\/', base_path('.git/')).'/', $info->getPathname()))
                continue;

            if (is_dir($info))
                continue;

            $files[] = $info->getPathname();
        }

        return $files;
    }

    public function get_matches($file)
    {
        $content = file_get_contents($file);

        preg_match_all("/trans ?\((['\"].*?['\"])\)/", $content, $matches);

        $matches = array_filter($matches);

        if (count($matches) != 0)
            return $matches[1];

        return [];
    }

    public function get_group_item($match)
    {
        $match = substr($match, 1, -1);

        $first_dot = strpos($match, '.');

        return [
            'group' => substr($match, 0, $first_dot),
            'item' => substr($match, $first_dot + 1)
        ];
    }
}