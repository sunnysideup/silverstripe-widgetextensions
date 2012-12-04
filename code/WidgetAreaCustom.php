<?php

class WidgetAreaCustom extends WidgetArea {

	static $has_one = array(
		"Page" => "Page"
	);

	function forTemplate() {
		return $this->renderWith("WidgetArea");
	}

}