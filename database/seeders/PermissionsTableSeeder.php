<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'product_create',
            ],
            [
                'id'    => 29,
                'title' => 'product_edit',
            ],
            [
                'id'    => 30,
                'title' => 'product_show',
            ],
            [
                'id'    => 31,
                'title' => 'product_delete',
            ],
            [
                'id'    => 32,
                'title' => 'product_access',
            ],
            [
                'id'    => 33,
                'title' => 'asset_management_access',
            ],
            [
                'id'    => 34,
                'title' => 'asset_category_create',
            ],
            [
                'id'    => 35,
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => 36,
                'title' => 'asset_category_show',
            ],
            [
                'id'    => 37,
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => 38,
                'title' => 'asset_category_access',
            ],
            [
                'id'    => 39,
                'title' => 'asset_location_create',
            ],
            [
                'id'    => 40,
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => 41,
                'title' => 'asset_location_show',
            ],
            [
                'id'    => 42,
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => 43,
                'title' => 'asset_location_access',
            ],
            [
                'id'    => 44,
                'title' => 'asset_status_create',
            ],
            [
                'id'    => 45,
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => 46,
                'title' => 'asset_status_show',
            ],
            [
                'id'    => 47,
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => 48,
                'title' => 'asset_status_access',
            ],
            [
                'id'    => 49,
                'title' => 'asset_create',
            ],
            [
                'id'    => 50,
                'title' => 'asset_edit',
            ],
            [
                'id'    => 51,
                'title' => 'asset_show',
            ],
            [
                'id'    => 52,
                'title' => 'asset_delete',
            ],
            [
                'id'    => 53,
                'title' => 'asset_access',
            ],
            [
                'id'    => 54,
                'title' => 'assets_history_access',
            ],
            [
                'id'    => 55,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 56,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 57,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 58,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 59,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 60,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 61,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 62,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 63,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 64,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 65,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 66,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 67,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 68,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 69,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 70,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 71,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 72,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 73,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 74,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 75,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 76,
                'title' => 'repair_system_access',
            ],
            [
                'id'    => 77,
                'title' => 'repair_create',
            ],
            [
                'id'    => 78,
                'title' => 'repair_edit',
            ],
            [
                'id'    => 79,
                'title' => 'repair_show',
            ],
            [
                'id'    => 80,
                'title' => 'repair_delete',
            ],
            [
                'id'    => 81,
                'title' => 'repair_access',
            ],
            [
                'id'    => 82,
                'title' => 'type_create',
            ],
            [
                'id'    => 83,
                'title' => 'type_edit',
            ],
            [
                'id'    => 84,
                'title' => 'type_show',
            ],
            [
                'id'    => 85,
                'title' => 'type_delete',
            ],
            [
                'id'    => 86,
                'title' => 'type_access',
            ],
            [
                'id'    => 87,
                'title' => 'brand_create',
            ],
            [
                'id'    => 88,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 89,
                'title' => 'brand_show',
            ],
            [
                'id'    => 90,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 91,
                'title' => 'brand_access',
            ],
            [
                'id'    => 92,
                'title' => 'status_create',
            ],
            [
                'id'    => 93,
                'title' => 'status_edit',
            ],
            [
                'id'    => 94,
                'title' => 'status_show',
            ],
            [
                'id'    => 95,
                'title' => 'status_delete',
            ],
            [
                'id'    => 96,
                'title' => 'status_access',
            ],
            [
                'id'    => 97,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 98,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 99,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 100,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 101,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 102,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 103,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 104,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 105,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 106,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 107,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 108,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 109,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 110,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 111,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 112,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 113,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 114,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 115,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 116,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 117,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
