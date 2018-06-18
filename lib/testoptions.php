<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 21.01.2016
 * Time: 21:08
 *
 * @author Pavel Shulaev (http://rover-it.me)
 */

namespace Rover\Fadmin;

use Rover\Fadmin\Inputs\Input;
use Rover\Fadmin\Options\Settings;

/**
 * Class TestOptions
 *
 * @package Rover\Fadmin
 * @author  Pavel Shulaev (http://rover-it.me)
 */
class TestOptions extends Options
{
	const MODULE_ID = 'rover.fadmin';

    /**
     * @param string $moduleId
     * @return static
     * @throws \Bitrix\Main\ArgumentNullException
     * @author Pavel Shulaev (https://rover-it.me)
     */
	public static function getInstance($moduleId = self::MODULE_ID)
	{
		return parent::getInstance(self::MODULE_ID);
	}

	/**
	 * @return array
	 * @author Pavel Shulaev (http://rover-it.me)
	 */
	public function getConfig()
	{
		return array(
			'tabs' => self::getTabs(),
            'settings' => array(
                Settings::BOOL_CHECKBOX => true,
                Settings::USE_SORT => true,
                Settings::GROUP_RIGHTS => true,
            )
        );
	}

    /**
     * @return array
     * @author Pavel Shulaev (https://rover-it.me)
     */
	protected static function getTabs()
    {
        return array(
            array(
                'name'          => 'test_tab',
                'label'         => 'test tab',
                'description'   => 'test tab description',
                'siteId'        => 's1',
                'inputs'        => array(
                    array(
                        'type'      => Input::TYPE__HEADER,
                        'label'     => 'First tab header',
                        'sort'      => 100,
                    ),
                    array(
                        'type'      => Input::TYPE__TEXT,
                        'name'      => 'text',
                        'label'     => 'text input (maxlength 50)',
                        'default'   => 'default text',
                        'maxLength' => 50,
                        'sort'      => '200'
                    ),
                    array(
                        'type'      => Input::TYPE__NUMBER,
                        'name'      => 'number',
                        'label'     => 'number input (min 0, max 100)',
                        'default'   => 50,
                        'max'       => 100,
                        'min'       => 0,
                        'sort'      => '300'
                    ),
                    array(
                        'type'      => Input::TYPE__TEXTAREA,
                        'name'      => 'input_textarea',
                        'label'     => 'input textarea (3 rows 20 cols)',
                        'default'   => 'default text',
                        'rows'      => 3,
                        'cols'      => 20,
                        'help'      => 'textarea help',
                        'sort'      => '500'
                    ),
                    array(
                        'type'      => Input::TYPE__CLOCK,
                        'name'      => 'clock',
                        'label'     => 'This is a clock',
                        'default'   => '15:15',
                        'sort'      => 400
                    ),
                    array(
                        'type'      => Input::TYPE__SUBTABCONTROL,
                        'name'      => 'subtabcontrol',
                        'label'     => 'subtabcontrol label',
                        'default'   => 'subtabcontrol default',
                        'sort'      => 550,
                        'subTabs'   => array(
                            array(
                                'type'      => Input::TYPE__SUBTAB,
                                'name'      => 'subtab_1',
                                'label'     => 'subtab 1 label',
                                'default'   => 'subtab 1 default',
                                'inputs'    => array(
                                    array(
                                        'type'      => Input::TYPE__COLOR,
                                        'name'      => 'color',
                                        'label'     => 'This is a color',
                                        'default'   => '15:15',
                                        'help'      => 'Please, select a color',
                                        'sort'      => '600'
                                    ),
                                    array(
                                        'type'      => Input::TYPE__CHECKBOX,
                                        'name'      => 'checkbox',
                                        'label'     => 'This is a checkbox',
                                        'default'   => '#FFFF00',
                                        'help'      => 'Please, check me!',
                                        'sort'      => '700'
                                    ),
                                )
                            ),
                            array(
                                'type'      => Input::TYPE__SUBTAB,
                                'name'      => 'subtab_2',
                                'label'     => 'subtab 2 label',
                                'default'   => 'subtab 2 default',
                                'inputs'    => array(
                                    array(
                                        'type'      => Input::TYPE__FILE,
                                        'name'      => 'file',
                                        'label'     => 'This is a file',
                                        'default'   => '',
                                        'help'      => 'You may load an image here (max size 1 M)',
                                        'maxSize'   => 1024 * 1024,
                                        'isImage'   => true,
                                        'sort'      => '800'
                                    ),
                                    array(
                                        'type'      => Input::TYPE__IBLOCK,
                                        'name'      => 'iblock',
                                        'label'     => 'This is a hidden single iblock',
                                        'sort'      => '900',
                                        'hidden'    => true
                                    ),
                                    array(
                                        'type'      => Input::TYPE__IBLOCK,
                                        'name'      => 'multiple_iblock',
                                        'multiple'  => true,
                                        'label'     => 'This is a multiple iblock',
                                        'sort'      => '500'
                                    ),
                                )
                            )
                        )
                    ),

                    array(
                        'type'      => Input::TYPE__ADD_PRESET,
                        'label'     => 'add preset s1',
                        'default'   => 'new preset default name',
                        'popup'     => 'add preset popup', // false - not show
                        'sort'      => '1100'
                    )
                )
            ),
            array(
                'name'          => 'presetTab',
                'label'         => 'Preset',
                'preset'        => true,
                'description'   => 'This is a description of preset tab',
                'siteId'        => 's1',
                'inputs'        => array(
                    array(
                        'type'      => Input::TYPE__HEADER,
                        'label'     => 'Preset header',
                    ),
                    array(
                        'type'      => Input::TYPE__PRESET_NAME,
                        'name'      => 'presetName',
                        'label'     => 'preset name',
                    ),
                    array(
                        'type'      => Input::TYPE__COLOR,
                        'name'      => 'preset_color',
                        'label'     => 'preset color',
                        'default'   => '#FFAA00',
                        'help'      => 'color help',
                    ),
                    array(
                        'type'      => Input::TYPE__REMOVE_PRESET,
                        'label'     => 'remove_preset',
                        'popup'     => 'Are you sure?',
                    )
                ),
            ),
            array(
                'name'          => 'tab_22',
                'label'         => '2 normal tab',
                'description'   => 'This is a description of second normal tab',
                'siteId'        => 'm',
                'inputs'        => array(
                    array(
                        'type'      => Input::TYPE__SELECTBOX,
                        'name'      => 'selectbox',
                        'label'     => 'single selectbox',
                        'options'   => array(
                            '0' => 'option 0',
                            '1' => 'option 1',
                            '2' => 'option 2'
                        )
                    ),
                    array(
                        'type'      => Input::TYPE__SELECTBOX,
                        'name'      => 'multiple_selectbox',
                        'label'     => 'Multiple selectbox',
                        'multiple'  => true,
                        'options'   => array(
                            '0' => 'option 0',
                            '1' => 'option 1',
                            '2' => 'option 2'
                        )
                    ),
                    array(
                        'type'      => Input::TYPE__SELECT_GROUP,
                        'name'      => 'select_group',
                        'label'     => 'select_group',
                        'options'   => array(
                            'g1' => array(
                                'name' => 'Group 1',
                                'options' => array(
                                    'g1:o1' => 'group 1: option 1',
                                    'g1:o2' => 'group 1: option 2',
                                    'g1:o3' => 'group 1: option 3',
                                )
                            ),
                            'g2' => array(
                                'name' => 'Group 2',
                                'options' => array(
                                    'g2:o1' => 'group 2: option 1',
                                    'g2:o2' => 'group 2: option 2',
                                    'g2:o3' => 'group 2: option 3',
                                )
                            ),
                            'g3' => array(
                                'name' => 'Group 3',
                                'options' => array(
                                    'g3:o1' => 'group 3: option 1',
                                    'g3:o2' => 'group 3: option 2',
                                    'g3:o3' => 'group 3: option 3',
                                )
                            )
                        )
                    ),
                    array(
                        'type'      => Input::TYPE__ADD_PRESET,
                        'label'     => 'add preset',
                        'default'   => 'new preset default name',
                        'popup'     => 'add preset popup 2' // false - not show
                    )
                )
            ),
            array(
                'name'          => 'presetTab2',
                'label'         => 'Preset2',
                'preset'        => true,
                'description'   => 'This is a description of preset tab 2',
                'siteId'        => 'm',
                'inputs'        => array(
                    array(
                        'type'      => Input::TYPE__HEADER,
                        'label'     => 'Preset header',
                    ),
                    array(
                        'type'      => Input::TYPE__COLOR,
                        'name'      => 'preset_color',
                        'label'     => 'preset color',
                        'default'   => '#FFAA00',
                        'help'      => 'color help',
                    ),
                    array(
                        'type'      => Input::TYPE__REMOVE_PRESET,
                        'label'     => 'remove_preset',
                        'popup'     => 'Are you sure?',
                    )
                ),
            ),
        );
    }

    /**
     * @param bool $reload
     * @return mixed
     * @throws \Bitrix\Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
	public function getTextareaValueS1($reload = false)
	{
		return $this->getNormalValue('input_textarea', 's1', $reload);
	}

    /**
     * @param      $presetId
     * @param bool $reload
     * @return mixed
     * @throws \Bitrix\Main\ArgumentNullException
     * @throws \Bitrix\Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
	public function getS1PresetColor($presetId, $reload = false)
	{
		return $this->getPresetValue('preset_color', $presetId, 's1', $reload);
	}
}