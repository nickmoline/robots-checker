<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . "/src")
    ->in(__DIR__ . "/tests");

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2'                             => true,
        'concat_space'                      => [
            'spacing'   =>  'one'
        ],
        'elseif'                            => true,
        'single_blank_line_at_eof'          => true,
        'phpdoc_no_empty_return'            => true,
        'phpdoc_align'                      => true,
        'phpdoc_to_comment'                 => true,
        'phpdoc_order'                      => true,
        'no_spaces_after_function_name'     => true,
        'function_declaration'              => [
            'closure_function_spacing' => 'one',
        ],
        'indentation_type'                  => true,
        'blank_line_after_namespace'        => true,
        'blank_line_after_opening_tag'      => true,
        'lowercase_constants'               => true,
        'lowercase_keywords'                => true,
        'method_argument_space'             => [
            'keep_multiple_spaces_after_comma' => false
        ],
        'no_trailing_whitespace'            => true,
        'no_trailing_whitespace_in_comment' => true,
        'new_with_braces'                   => true,
    ])
    ->setFinder($finder);
