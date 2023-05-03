# MONOSPACE FONT
Consolas Ligaturized v3 - Ultimate Programmers :rage: :heart:
`'Consolas ligaturized v3', monospace`  
```json
  "editor.fontFamily": "'Consolas ligaturized v3', Consolas, monospace",
  "editor.codeLensFontFamily": "'Consolas ligaturized v3', Consolas, monospace",
  "debug.console.fontFamily": "'Consolas ligaturized v3', Consolas, monospace",
  "interactiveSession.editor.fontFamily": "'Consolas ligaturized v3', Consolas, monospace",
  "editor.fontLigatures": true`
```
<https://github.com/somq/consolas-ligaturized>

Consolas - Best Vanilla Font :heart::heart::heart:  
`'Lucida Console', monospace`  

Lucida Console - 2º Best Vanilla Font :heart:  
`'Lucida Console', monospace`  



# PHP OPTIMIZATION
<https://blog.theodo.com/2019/07/vscode-php-development/>  
<https://codevoweb.com/top-10-best-vs-code-extensions-for-php-developers/>  



# SHORTCUTS
<https://code.visualstudio.com/docs/getstarted/keybindings#:~:text=All%20keyboard%20shortcuts%20in%20VS,of%20the%20editor%20title%20bar.>



# SPELL CHECKER
```php
/* spellchecker: enable */
/* spellchecker: disable */
```



# INTELLISENSE
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



# INTELLIPHENSE
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



# MARKDOWN
:warning: Not Working
- Install the font `Segoe UI`
- Put the file `markdown-github.css` on your VS Code config root folder:
  - (WINDOWS) `C:\Users\{user-name}\AppData\Roaming\Code\User`
- Add to the VS Code settings file `settings.json`:
```json
"markdown.styles": [
  "github.css"
]
```

