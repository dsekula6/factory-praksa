<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* index.html.twig */
class __TwigTemplate_1e4c44fc85f3716171b81ea66f0c542c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>";
        // line 10
        echo twig_escape_filter($this->env, ($context["key1"] ?? null), "html", null, true);
        echo "</h1>
    </header>

    <main>
        <article>
            <h2>Article 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sagittis erat vel eleifend dapibus. Fusce nec eleifend arcu. Duis rhoncus odio a arcu porttitor, vitae cursus nunc suscipit. Sed a leo velit. Etiam consectetur tortor nec risus auctor, ac rutrum dolor finibus. Phasellus auctor odio id turpis faucibus fringilla. Donec non est vel mauris bibendum congue. Vivamus sit amet dolor nec elit volutpat dapibus. Ut a sem non justo fermentum accumsan. Curabitur accumsan arcu in mauris ullamcorper, eu mollis est tincidunt. Integer auctor elit vel ligula euismod, eget venenatis lectus consequat. Ut hendrerit urna tellus, non aliquet turpis pharetra ut.</p>
        </article>

        <article>
            <h2>Article 2</h2>
            <p>Nulla vel elit et eros sagittis posuere. Nunc blandit nisi et risus convallis dapibus. Sed sit amet venenatis odio, at efficitur ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse potenti. Ut blandit vestibulum orci, quis feugiat ex vehicula a. In hac habitasse platea dictumst. Nunc id tellus ac tellus aliquet dictum nec id elit. Nam et urna at metus tempus facilisis. Pellentesque id mauris nibh. Nulla facilisi. Sed mattis, nisl nec mattis viverra, metus eros mollis quam, id gravida odio elit non nunc. Vestibulum vitae purus quam.</p>
        </article>

        <section>
            <h2>Contact Us</h2>
            <form action=\"/submit\" method=\"post\">
                <label for=\"name\">Name:</label>
                <input type=\"text\" id=\"name\" name=\"name\" required>

                <label for=\"email\">Email:</label>
                <input type=\"email\" id=\"email\" name=\"email\" required>

                <label for=\"message\">Message:</label>
                <textarea id=\"message\" name=\"message\" rows=\"4\" required></textarea>

                <button type=\"submit\">Send</button>
            </form>
        </section>
    </main>

    <footer>
        <p></p>
    </footer>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>{{ key1 }}</h1>
    </header>

    <main>
        <article>
            <h2>Article 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sagittis erat vel eleifend dapibus. Fusce nec eleifend arcu. Duis rhoncus odio a arcu porttitor, vitae cursus nunc suscipit. Sed a leo velit. Etiam consectetur tortor nec risus auctor, ac rutrum dolor finibus. Phasellus auctor odio id turpis faucibus fringilla. Donec non est vel mauris bibendum congue. Vivamus sit amet dolor nec elit volutpat dapibus. Ut a sem non justo fermentum accumsan. Curabitur accumsan arcu in mauris ullamcorper, eu mollis est tincidunt. Integer auctor elit vel ligula euismod, eget venenatis lectus consequat. Ut hendrerit urna tellus, non aliquet turpis pharetra ut.</p>
        </article>

        <article>
            <h2>Article 2</h2>
            <p>Nulla vel elit et eros sagittis posuere. Nunc blandit nisi et risus convallis dapibus. Sed sit amet venenatis odio, at efficitur ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse potenti. Ut blandit vestibulum orci, quis feugiat ex vehicula a. In hac habitasse platea dictumst. Nunc id tellus ac tellus aliquet dictum nec id elit. Nam et urna at metus tempus facilisis. Pellentesque id mauris nibh. Nulla facilisi. Sed mattis, nisl nec mattis viverra, metus eros mollis quam, id gravida odio elit non nunc. Vestibulum vitae purus quam.</p>
        </article>

        <section>
            <h2>Contact Us</h2>
            <form action=\"/submit\" method=\"post\">
                <label for=\"name\">Name:</label>
                <input type=\"text\" id=\"name\" name=\"name\" required>

                <label for=\"email\">Email:</label>
                <input type=\"email\" id=\"email\" name=\"email\" required>

                <label for=\"message\">Message:</label>
                <textarea id=\"message\" name=\"message\" rows=\"4\" required></textarea>

                <button type=\"submit\">Send</button>
            </form>
        </section>
    </main>

    <footer>
        <p></p>
    </footer>
</body>
</html>
", "index.html.twig", "E:\\Programs\\XAMPP\\htdocs\\factory\\templates\\index.html.twig");
    }
}
