# VS CODE

## PHP Optimization

<https://blog.theodo.com/2019/07/vscode-php-development/>
<https://codevoweb.com/top-10-best-vs-code-extensions-for-php-developers/>



## SHORTCUTS

<https://code.visualstudio.com/docs/getstarted/keybindings#:~:text=All%20keyboard%20shortcuts%20in%20VS,of%20the%20editor%20title%20bar.>



## SPELL CHECKER

```php
/* spellchecker: enable */
/* spellchecker: disable */
```



## INTELLISENSE

```json
[
    {
        "key": "ctrl+space",
        "command": "editor.action.triggerSuggest",
        "when": "editorHasCompletionItemProvider && editorTextFocus && !editorReadonly"
    },
    {
        "key": "ctrl+space",
        "command": "toggleSuggestionDetails",
        "when": "editorTextFocus && suggestWidgetVisible"
    },
    {
        "key": "ctrl+alt+space",
        "command": "toggleSuggestionFocus",
        "when": "editorTextFocus && suggestWidgetVisible"
    }
]
```

<https://code.visualstudio.com/docs/editor/intellisense>



## INTELLIPHENSE

```php
    <?php
    /** @var callable $var */
    $var = 'is_numeric'; //$var is callable instead of string
    $var = 1; //$var is now an int
```

<https://github.com/bmewburn/vscode-intelephense>
<https://github.com/bmewburn/intelephense-docs>
<https://github.com/bmewburn/intelephense-docs/blob/master/installation.md>
<https://github.com/bmewburn/intelephense-docs/blob/master/gettingStarted.md>
