<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 11.01.2016
 * Time: 17:41
 *
 * @author Pavel Shulaev (http://rover-it.me)
 */

namespace Rover\Fadmin\Inputs;

use Rover\Fadmin\Options;
/**
 * Class Textarea
 *
 * @package Rover\Fadmin\Inputs
 * @author  Pavel Shulaev (http://rover-it.me)
 */
class Textarea extends Input
{
	/** @var int */
	protected $rows = 3;

	/** @var int */
	protected $cols = 50;

    /**
     * Textarea constructor.
     *
     * @param array      $params
     * @param Options    $options
     * @param Input|null $parent
     * @throws \Bitrix\Main\ArgumentNullException
     * @throws \Bitrix\Main\ArgumentOutOfRangeException
     */
	public function __construct(array $params, Options $options, Input $parent = null)
	{
		parent::__construct($params, $options, $parent);

		if (isset($params['rows']))
			$this->rows = htmlspecialcharsbx($params['rows']);

		if (isset($params['cols']))
			$this->cols = htmlspecialcharsbx($params['cols']);
	}

    /**
     * @return int
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @param $rows
     * @return $this
     * @author Pavel Shulaev (https://rover-it.me)
     */
    public function setRows($rows)
    {
        $this->rows = $rows;

        return $this;
    }

    /**
     * @return int
     */
    public function getCols()
    {
        return $this->cols;
    }

    /**
     * @param $cols
     * @return $this
     * @author Pavel Shulaev (https://rover-it.me)
     */
    public function setCols($cols)
    {
        $this->cols = $cols;

        return $this;
    }
}