<?php

namespace App\View\Components\home;

use Illuminate\View\Component;

class CtaButton extends Component
{

    /**
     * The button type
     *
     * @var string
     */
    public $type;

    /**
     * The button's first line
     *
     * @var string
     */
    public $text1;

    /**
     * The button's second line
     *
     * @var string
     */
    public $text2;

    /**
     * The button's triggered line
     *
     * @var string
     */
    public $triggerText;

    /**
     * The button's triggered line
     *
     * @var url
     */
    public $href;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $text1, $text2, $triggerText = '', $href = '')
    {
        $this->type = $type;
        $this->text1 = $text1;
        $this->text2 = $text2;
        $this->triggerText = $triggerText;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.CtaButton');
    }
}
