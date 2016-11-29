<?php

class WidgetAreaCustom extends WidgetArea
{
    private static $has_one = array(
        "Page" => "Page"
    );

    public function forTemplate()
    {
        return $this->renderWith("WidgetArea");
    }
}
