<?php declare(strict_types=1);
/**
 * SvenSchrodt\Frontend\Html\PhpTemplate - Class for parsing templates using
 *
 *  - PHP's alternative syntax in tpl files
 *  - no limitation to public access to members (“template variables”)
 *      -> extend it, if you want to rule limits &
 *              -> overwrite PhpTemplate::assign(), ::_set(), ::get()
 *
 * @package PhPlay
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @link https://github.com/svenschrodt/PhPlay
 * @version 0.1
 * @since 20201-11-07
 */


namespace SvenSchrodt\PhPlay\Frontend\Html;

class PhpTemplate
{
    protected array $content = [];

    protected string $currentTemplate;

    public function __construct(string $template, array $content =[])
    {
        $this->currentTemplate = $template;
        if(count($content)) {
            $this->content = $content;
        }

    }

    public function assign(string $name, $value)
    {
        $this->content[$name] = $value;
    }

    public function get(string $name)
    {
        return $this->content[$name] ?? null;
    }

    public function render(string $template = '')
    {
        if(strlen($template)!==0) {
            $this->currentTemplate = $template;
        }
        ob_start();
        require_once $this->currentTemplate;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function __get(string $name)
    {
        return $this->get($name);
    }

    public function __set(string $name, $value)
    {
        $this->assign($name, $value);
        return $this;
    }

    public function __toString(): string
    {
        return $this->render();
    }
}