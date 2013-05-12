<?php



/**
 * This class defines the structure of the 'menu' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.georginfanger.map
 */
class MenuTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'georginfanger.map.MenuTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('menu');
        $this->setPhpName('Menu');
        $this->setClassname('Menu');
        $this->setPackage('georginfanger');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('pk_menu', 'PkMenu', 'INTEGER', true, 32, null);
        $this->addColumn('menu_name_de', 'MenuNameDe', 'VARCHAR', true, 10, null);
        $this->addColumn('menu_name_en', 'MenuNameEn', 'VARCHAR', true, 10, null);
        $this->addColumn('menu_link', 'MenuLink', 'VARCHAR', true, 20, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // MenuTableMap
