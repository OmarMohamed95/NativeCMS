<?php

class themeController{

    function __construct() {
        $this->model = new model();
        $pID = $this->getParentsSectionsID();
        $this->getParentSections($pID);
        $this->getChildSections();
        $this->getSections($pID);
        $this->sittings();
    }

    // get the ID of the sections that have children to pass them as a parameter to the next func getParentSections
    public function getParentsSectionsID() {
        $parentsID = $this->model->getParentsSectionsID();
        $pID = '';
        foreach ($parentsID as $value) {
            $pID .= $value['parentID'] . ',';
        }
        return $pID = rtrim($pID, ',');
    }

    public function getParentSections($pID) {
        $this->parentSections = $this->model->getParentSections($pID);
    }

    public function getChildSections() {
        $this->childSections = $this->model->getChildSections();
    }

    // section does not have children and they are not children also
    public function getSections($pID) {
        $this->Sections = $this->model->getSections($pID);
    }
    
    public function sittings() {
        $this->sittings = $this->model->sittings();
    }

}
