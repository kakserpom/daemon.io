## contribute # Contribute

If you want to help the project, then do not hesitate to start even if you have only a bit of time for it.
Any help is appreciated.

### this-doc # This documentation

We are struggling to minimize amount of undocumented parts, but we are running out of hands.
Even a paragraph written in 10 minutes is a big deal.


#### making-changes # Making changes

> Consider writing in the language you know best among all others.
> If you are bold enough to add new language, base it upon the most similar one of existing languages.

 1. Fork a repository [kakserpom/daemon.io](https://github.com/kakserpom/daemon.io)
 2. Change Markdown (.md) files in folder `./docs/&ltlanguage&gt/`
 3. Compile index.html by executing `./docs/build`
 4. Look how it looks in browser
 5. Send Pull Request

> Want to see changes in browser without running the command?
> Run `watch -n1 ./docs/build` — it shall be rebuilt every second

#### markdown # Format of documentation
We use the [Markdown](http://ru.wikipedia.org/wiki/Markdown) with some extensions.

##### nesting # Nesting

For your convenience, documentation is split between many small files.
Including a file: `&lt;!-- import filepath.md --&gt;`.
Path is relative.

##### const # Constants

Constants are used for i18n and shortcuts for frequently used templates.
They may be defined as simple as that: `&lt;!-- pvar Name Value --&gt;`

Mandatory i18n contants `lang`, `title` and `menu-*` must be present in each translation of this documentation.

Constants may be used as templates. Calling a template: `{Name Value1 Value1...}`. Values will be places in result instead of `%s`.

Example of a template:
`&lt;!-- pvar tpl-outlink &lt;a target="_blank" href="%s"&gt;%s&lt;i class="fa fa-external-link"&gt;&lt;/i&gt;&lt;/a&gt; --&gt;`

Example of its usage:
`&#123;tpl-outlink http://en.wikipedia.org/wiki/Markdown Markdown&#125;`

##### headings # Headings
Headings may be defined like that:

 - `## anchor # Title`
 - `## anchor # Title #> Formatted heaing`

`anchor` - an identifier for navigation which takes place in URL. Allowed symbols are `[a-zA-Z0-9_-]`. Must be unique among anchors of its level to avoid URL collisions.

`Formatted heading` is used in case if heading in the page body should differ from heading in the navigation bar.

Examples:

 - Heading of first level `## contribute # Внести свою лепту`
 - Second level of heading: `### this-doc # This documentation`
 - Third level of heading: `#### markdown # Format of documentation`
 - Fourth level of heading: `#### headings # Headings`
 - Formatted heading: `### mysql # MySQL #> Clients \ MySQL`

> If you are adding new heading, make sure that anchor is written in English (strictly) and is simple and informative. Anchors are not supposed to be translated

##### lists # Lists

You can set CSS class of list element.

```
 -.n Element without list mark
 -.n.ti Element without list mark with indentation from the previous one
```

The following classes are currently in use:

 - `.n` - Элемент без символа списка
 - `.ti` - Indentation from the previous one
 - `.method` - special CSS-class for Methods

##### italic-and-bold # Italic and bold

Italic and bold works with `*`, `_` is not available due to the compatibility reasons.

##### single-line-code # Single line code

The code is wrapped into apostrophes `&#96;...&#96;` with the additional possibility to use modifiers and CSS classes.
Modifiers are options that enable additional text processing.
Modifiers and classes are written after the opening apostrophe and must be closed with an additional one before the text starts. Modifiers are specified by a preceding `:` (colon). Each modifier is indicated by one single letter. Classes are specified with a leading period.

> When specifying both modifiers and classes at the same time, the modifiers must be written first.

List of modifiers:

 - `:e` - Encode characters (default character encoding is off)
 - `:p` - Parse references
 - `:h` - PHP code syntax highlighting
 - `:c` - стилевое оформление без фона и обводки

Only the `.clear` class can be used at the moment, but it is better to specify the modifier `:c`.

Usage examples:

 - `&#96;:hc&#96;$url&#96;`
 - `&#96;:p&#96;max-requests (&#91;Number&#93;(#config/types/number) = '10k')&#96;`
 - `&#96;:ph.clear&#96;callback ( &#91;Connection&#93;(#clients/http/connection) $conn, boolean $success )&#96;`

##### multi_code # Multi-line code

Multi-line code with additional syntax highlighting and CSS classes. The code containing the configuration is indicated by the ruby syntax.

The only available class at the moment is `.inline' for method definitions.

Examples:

> &#96;&#96;&#96;php.inline
> void public post ( url $url, array $data, array $params )
> void public post ( url $url, array $data, callable $resultcb )
> &#96;&#96;&#96;

> &#96;&#96;&#96;ruby
> Pool:HTTPServer {
> &nbsp;&nbsp;&nbsp;&nbsp;listen "tcp://0.0.0.0:80", "tcp://0.0.0.0:443##myContext";
> &nbsp;&nbsp;&nbsp;&nbsp;port 80;
> &nbsp;&nbsp;&nbsp;&nbsp;privileged;
> &nbsp;&nbsp;&nbsp;&nbsp;maxconcurrency 1;
> }
> &#96;&#96;&#96;

### php-doc # PHPDoc

Similarly, to fill in any gaps in the PHPDoc comments of the code, fork [main respository](https://github.com/kakserpom/phpdaemon), make changes and send a Pull Request.

> Please note that all PHPDoc comments are written strictly in English.

### code # Software code

Improvements to the program code are always welcome. If you have a module to publish and you think it deserves to be included in the main repository, send a Pull Request. Do the same with existing code improvements.
