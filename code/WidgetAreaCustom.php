<?php

class WidgetAreaCustom extends WidgetArea {

	private static $has_one = array(
		"Page" => "Page"
	);

	function forTemplate() {
		return $this->renderWith("WidgetArea");
	}

}
