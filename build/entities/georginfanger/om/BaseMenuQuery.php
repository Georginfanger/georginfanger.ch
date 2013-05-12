<?php


/**
 * Base class that represents a query for the 'menu' table.
 *
 *
 *
 * @method MenuQuery orderByPkMenu($order = Criteria::ASC) Order by the pk_menu column
 * @method MenuQuery orderByMenuNameDe($order = Criteria::ASC) Order by the menu_name_de column
 * @method MenuQuery orderByMenuNameEn($order = Criteria::ASC) Order by the menu_name_en column
 * @method MenuQuery orderByMenuLink($order = Criteria::ASC) Order by the menu_link column
 *
 * @method MenuQuery groupByPkMenu() Group by the pk_menu column
 * @method MenuQuery groupByMenuNameDe() Group by the menu_name_de column
 * @method MenuQuery groupByMenuNameEn() Group by the menu_name_en column
 * @method MenuQuery groupByMenuLink() Group by the menu_link column
 *
 * @method MenuQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MenuQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MenuQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Menu findOne(PropelPDO $con = null) Return the first Menu matching the query
 * @method Menu findOneOrCreate(PropelPDO $con = null) Return the first Menu matching the query, or a new Menu object populated from the query conditions when no match is found
 *
 * @method Menu findOneByMenuNameDe(string $menu_name_de) Return the first Menu filtered by the menu_name_de column
 * @method Menu findOneByMenuNameEn(string $menu_name_en) Return the first Menu filtered by the menu_name_en column
 * @method Menu findOneByMenuLink(string $menu_link) Return the first Menu filtered by the menu_link column
 *
 * @method array findByPkMenu(int $pk_menu) Return Menu objects filtered by the pk_menu column
 * @method array findByMenuNameDe(string $menu_name_de) Return Menu objects filtered by the menu_name_de column
 * @method array findByMenuNameEn(string $menu_name_en) Return Menu objects filtered by the menu_name_en column
 * @method array findByMenuLink(string $menu_link) Return Menu objects filtered by the menu_link column
 *
 * @package    propel.generator.georginfanger.om
 */
abstract class BaseMenuQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMenuQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'georginfanger', $modelName = 'Menu', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MenuQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MenuQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MenuQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MenuQuery) {
            return $criteria;
        }
        $query = new MenuQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Menu|Menu[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MenuPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MenuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Menu A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPkMenu($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Menu A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `pk_menu`, `menu_name_de`, `menu_name_en`, `menu_link` FROM `menu` WHERE `pk_menu` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Menu();
            $obj->hydrate($row);
            MenuPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Menu|Menu[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Menu[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MenuPeer::PK_MENU, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MenuPeer::PK_MENU, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the pk_menu column
     *
     * Example usage:
     * <code>
     * $query->filterByPkMenu(1234); // WHERE pk_menu = 1234
     * $query->filterByPkMenu(array(12, 34)); // WHERE pk_menu IN (12, 34)
     * $query->filterByPkMenu(array('min' => 12)); // WHERE pk_menu >= 12
     * $query->filterByPkMenu(array('max' => 12)); // WHERE pk_menu <= 12
     * </code>
     *
     * @param     mixed $pkMenu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByPkMenu($pkMenu = null, $comparison = null)
    {
        if (is_array($pkMenu)) {
            $useMinMax = false;
            if (isset($pkMenu['min'])) {
                $this->addUsingAlias(MenuPeer::PK_MENU, $pkMenu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pkMenu['max'])) {
                $this->addUsingAlias(MenuPeer::PK_MENU, $pkMenu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuPeer::PK_MENU, $pkMenu, $comparison);
    }

    /**
     * Filter the query on the menu_name_de column
     *
     * Example usage:
     * <code>
     * $query->filterByMenuNameDe('fooValue');   // WHERE menu_name_de = 'fooValue'
     * $query->filterByMenuNameDe('%fooValue%'); // WHERE menu_name_de LIKE '%fooValue%'
     * </code>
     *
     * @param     string $menuNameDe The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByMenuNameDe($menuNameDe = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($menuNameDe)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $menuNameDe)) {
                $menuNameDe = str_replace('*', '%', $menuNameDe);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MenuPeer::MENU_NAME_DE, $menuNameDe, $comparison);
    }

    /**
     * Filter the query on the menu_name_en column
     *
     * Example usage:
     * <code>
     * $query->filterByMenuNameEn('fooValue');   // WHERE menu_name_en = 'fooValue'
     * $query->filterByMenuNameEn('%fooValue%'); // WHERE menu_name_en LIKE '%fooValue%'
     * </code>
     *
     * @param     string $menuNameEn The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByMenuNameEn($menuNameEn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($menuNameEn)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $menuNameEn)) {
                $menuNameEn = str_replace('*', '%', $menuNameEn);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MenuPeer::MENU_NAME_EN, $menuNameEn, $comparison);
    }

    /**
     * Filter the query on the menu_link column
     *
     * Example usage:
     * <code>
     * $query->filterByMenuLink('fooValue');   // WHERE menu_link = 'fooValue'
     * $query->filterByMenuLink('%fooValue%'); // WHERE menu_link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $menuLink The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByMenuLink($menuLink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($menuLink)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $menuLink)) {
                $menuLink = str_replace('*', '%', $menuLink);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MenuPeer::MENU_LINK, $menuLink, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Menu $menu Object to remove from the list of results
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function prune($menu = null)
    {
        if ($menu) {
            $this->addUsingAlias(MenuPeer::PK_MENU, $menu->getPkMenu(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
