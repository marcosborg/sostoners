<?php

return [
    'userManagement' => [
        'title'          => 'Gestão de usuários',
        'title_singular' => 'Gestão de usuários',
    ],
    'permission' => [
        'title'          => 'Permissões',
        'title_singular' => 'Permissão',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Nome da permissão',
            'title_helper'      => '(Pedir à programação)',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Grupos',
        'title_singular' => 'Função',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Nome do grupo',
            'title_helper'       => ' ',
            'permissions'        => 'Permissões',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Usuários',
        'title_singular' => 'Usuário',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Nome',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verificado em',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Regras',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'productManagement' => [
        'title'          => 'Gestor de produtos',
        'title_singular' => 'Gestor de produto',
    ],
    'productCategory' => [
        'title'          => 'Categorias',
        'title_singular' => 'Categoria',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Nome',
            'name_helper'        => ' ',
            'description'        => 'Descrição',
            'description_helper' => ' ',
            'photo'              => 'Imagem',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'productTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nome',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'product' => [
        'title'          => 'Produtos',
        'title_singular' => 'Produto',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Nome',
            'name_helper'        => ' ',
            'description'        => 'Descrição',
            'description_helper' => ' ',
            'price'              => 'Preço',
            'price_helper'       => ' ',
            'category'           => 'Categorias',
            'category_helper'    => ' ',
            'tag'                => 'Tags',
            'tag_helper'         => ' ',
            'photo'              => 'Imagens',
            'photo_helper'       => 'Máximas dimensões (1500 X 1500)',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'assetManagement' => [
        'title'          => 'Gestão de ativos',
        'title_singular' => 'Gestão de ativo',
    ],
    'assetCategory' => [
        'title'          => 'Categorias',
        'title_singular' => 'Categoria',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nome',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'assetLocation' => [
        'title'          => 'Localização',
        'title_singular' => 'Localização',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nome',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
            'address'           => 'Endereço',
            'address_helper'    => ' ',
            'zip'               => 'Código postal',
            'zip_helper'        => ' ',
            'location'          => 'Localidade',
            'location_helper'   => ' ',
            'country'           => 'País',
            'country_helper'    => ' ',
            'customer'          => 'Cliente',
            'customer_helper'   => ' ',
        ],
    ],
    'assetStatus' => [
        'title'          => 'Estados',
        'title_singular' => 'Estado',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nome',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'asset' => [
        'title'          => 'Ativos',
        'title_singular' => 'Ativo',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'category'             => 'Categoria',
            'category_helper'      => ' ',
            'serial_number'        => 'Número de série',
            'serial_number_helper' => ' ',
            'name'                 => 'Nome',
            'name_helper'          => ' ',
            'photos'               => 'Imagens e ficheiros',
            'photos_helper'        => ' ',
            'status'               => 'Estado',
            'status_helper'        => ' ',
            'location'             => 'Localização',
            'location_helper'      => ' ',
            'notes'                => 'Anotações',
            'notes_helper'         => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated At',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted At',
            'deleted_at_helper'    => ' ',
            'monthly_value'        => 'Custo mensal',
            'monthly_value_helper' => ' ',
            'offers'               => 'Ofertas',
            'offers_helper'        => ' ',
            'customer'             => 'Cliente',
            'customer_helper'      => ' ',
        ],
    ],
    'assetsHistory' => [
        'title'          => 'Histórico de ativos',
        'title_singular' => 'Histórico de ativo',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'asset'                => 'Ativo',
            'asset_helper'         => ' ',
            'status'               => 'Estado',
            'status_helper'        => ' ',
            'location'             => 'Localização',
            'location_helper'      => ' ',
            'assigned_user'        => 'Cliente',
            'assigned_user_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated At',
            'updated_at_helper'    => ' ',
        ],
    ],
    'basicCRM' => [
        'title'          => 'CRM',
        'title_singular' => 'CRM',
    ],
    'crmStatus' => [
        'title'          => 'Estados',
        'title_singular' => 'Estado',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nome',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'crmCustomer' => [
        'title'          => 'Clientes',
        'title_singular' => 'Cliente',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'first_name'         => 'Primeiro nome',
            'first_name_helper'  => ' ',
            'last_name'          => 'Último nome',
            'last_name_helper'   => ' ',
            'email'              => 'Email',
            'email_helper'       => ' ',
            'phone'              => 'Contacto telefónico',
            'phone_helper'       => ' ',
            'address'            => 'Endereço',
            'address_helper'     => ' ',
            'website'            => 'Website',
            'website_helper'     => ' ',
            'description'        => 'Descrição',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
            'zip'                => 'Código postal',
            'zip_helper'         => ' ',
            'company'            => 'Empresa',
            'company_helper'     => ' ',
            'vat'                => 'Contribuinte',
            'vat_helper'         => ' ',
            'location'           => 'Localidade',
            'location_helper'    => ' ',
            'country'            => 'País',
            'country_helper'     => ' ',
            'phone_2'            => 'Contacto alternativo',
            'phone_2_helper'     => ' ',
        ],
    ],
    'crmNote' => [
        'title'          => 'Anotações',
        'title_singular' => 'Anotaçõe',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'customer'          => 'Cliente',
            'customer_helper'   => ' ',
            'note'              => 'Anotação',
            'note_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'crmDocument' => [
        'title'          => 'Documentos',
        'title_singular' => 'Documento',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'customer'             => 'Cliente',
            'customer_helper'      => ' ',
            'document_file'        => 'Ficheiro',
            'document_file_helper' => ' ',
            'name'                 => 'Nome do documento',
            'name_helper'          => ' ',
            'description'          => 'Descrição',
            'description_helper'   => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated At',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted At',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'repairSystem' => [
        'title'          => 'Gestão de reparações',
        'title_singular' => 'Gestão de reparaçõe',
    ],
    'repair' => [
        'title'          => 'Reparações',
        'title_singular' => 'Reparaçõe',
        'fields'         => [
            'id'                             => 'ID',
            'id_helper'                      => ' ',
            'user'                           => 'Técnico',
            'user_helper'                    => ' ',
            'crm_customer'                   => 'Cliente',
            'crm_customer_helper'            => ' ',
            'created_at'                     => 'Created at',
            'created_at_helper'              => ' ',
            'updated_at'                     => 'Updated at',
            'updated_at_helper'              => ' ',
            'deleted_at'                     => 'Deleted at',
            'deleted_at_helper'              => ' ',
            'start_datetime'                 => 'Data e hora da reparação',
            'start_datetime_helper'          => ' ',
            'end_datetime'                   => 'Data e hora da conclusão',
            'end_datetime_helper'            => ' ',
            'description'                    => 'Descrição primária',
            'description_helper'             => ' ',
            'type'                           => 'Tipo de reparação',
            'type_helper'                    => ' ',
            'brand'                          => 'Marca do equipamento',
            'brand_helper'                   => ' ',
            'model'                          => 'Modelo do equipamento',
            'model_helper'                   => ' ',
            'description_to_customer'        => 'Descrição para o cliente',
            'description_to_customer_helper' => ' ',
            'internal_description'           => 'Descrição interna',
            'internal_description_helper'    => ' ',
            'status'                         => 'Estado da reparação',
            'status_helper'                  => ' ',
            'accessories'                    => 'Acessórios',
            'accessories_helper'             => ' ',
            'photos'                         => 'Fotografias',
            'photos_helper'                  => 'Máximas dimensões (1500 X 1500)',
            'product'                        => 'Produtos utilizados',
            'product_helper'                 => ' ',
        ],
    ],
    'type' => [
        'title'          => 'Tipos de avarias',
        'title_singular' => 'Tipos de avaria',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nome',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'brand' => [
        'title'          => 'Marcas',
        'title_singular' => 'Marca',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nome',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'status' => [
        'title'          => 'Estados das avarias',
        'title_singular' => 'Estados das avaria',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nome',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentManagement' => [
        'title'          => 'Gestor de conteudo',
        'title_singular' => 'Gestor de conteudo',
    ],
    'contentCategory' => [
        'title'          => 'Categorias',
        'title_singular' => 'Categoria',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nome',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nome',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentPage' => [
        'title'          => 'Pages',
        'title_singular' => 'Page',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Título',
            'title_helper'      => ' ',
            'category'          => 'Categorias',
            'category_helper'   => ' ',
            'tag'               => 'Tags',
            'tag_helper'        => ' ',
            'page_text'         => 'Texto',
            'page_text_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
];
