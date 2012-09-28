<?
class CatalogModule extends EWebModule{
    
    public function init(){
        $this->setImport(array(
            'catalog.models.*',
            'catalog.components.*',
        ));
    }
}