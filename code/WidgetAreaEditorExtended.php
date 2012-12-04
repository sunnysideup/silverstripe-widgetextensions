<?php
/**
 * Get more out of your WidgetAreaEditor
 * @package cms
 * @subpackage content
 * @author nicolaas [at] sunnysideup.co.nz
 */
class WidgetAreaEditorExtended extends WidgetAreaEditor {

	protected $availableWidgets = array();

	protected $blockedWidgets = array();

	function addToAvailableWidgets($array) {
		if(!is_array($array)) {user_error("first and only arugment for WidgetAreaEditor::addToAvailableWidgets must be an array", E_USER_ERROR);}
		$this->availableWidgets = $array;
	}

	function blockFromAvailableWidgets($array) {
	if(!is_array($array)) {user_error("first and only arugment for WidgetAreaEditor::blockFromAvailableWidgets must be an array", E_USER_ERROR);}
		$this->blockedWidgets = $array;
	}

	function AvailableWidgets() {
		$classes = ClassInfo::subclassesFor('Widget');
		array_shift($classes);
		$widgets= new DataObjectSet();
		$hasSpecificallyAddedWidgets = count($this->availableWidgets) && is_array($this->availableWidgets);
		$hasSpecificallyBlockedWidgets = count($this->blockedWidgets) && is_array($this->blockedWidgets);

		foreach($classes as $class) {
			if($hasSpecificallyAddedWidgets) {
				if(!in_array($class, $this->availableWidgets)) {
					$class = '';
				}
			}
			if($hasSpecificallyBlockedWidgets) {
				if(in_array($class, $this->blockedWidgets)) {
					$class = '';
				}
			}
			if($class) {
				$widgets->push(singleton($class));
			}
		}

		return $widgets;
	}

}

?>