<?php

/**
 * @Author: nguyen
 * @Date:   2021-05-13 13:38:40
 * @Last Modified by: Alex Dong
 * @Last Modified time: 2021-05-13 14:05:49
 */

namespace Magepow\AutoFlushCache\Model\Config\Source;

class Type implements \Magento\Framework\Option\ArrayInterface
{
 
    public function toOptionArray()
    {
        return [
            ['value' => 'config',                 'label' => __('Configuration')],
            ['value' => 'layout',                 'label' => __('Layouts')],
            ['value' => 'block_html',             'label' => __('Blocks HTML output')],
            ['value' => 'collections',            'label' => __('Collections Data')],
            ['value' => 'reflection',             'label' => __('Reflection Data')],
            ['value' => 'db_ddl',                 'label' => __('Database DDL operations')],
            ['value' => 'compiled_config',        'label' => __('Compiled Config')],
            ['value' => 'eav',                    'label' => __('EAV types and attributes')],
            ['value' => 'customer_notification',  'label' => __('Customer Notification')],
            ['value' => 'config_integration',     'label' => __('Integrations Configuration')],
            ['value' => 'config_integration_api', 'label' => __('Integrations API Configuration')],
            ['value' => 'full_page',              'label' => __('Page Cache')],
            ['value' => 'config_webservice',      'label' => __('Web Services Configuration')],
            ['value' => 'translate',              'label' => __('Translations')],
            ['value' => 'vertex',                 'label' => __('Vertex')]
        ];
    }

}