<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'        => 'Microsoft',
                'slug'        => 'microsoft',
                'logo'        => 'microsoft.png',
                'website'     => 'https://www.microsoft.com',
                'description' => 'Microsoft software solutions.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Adobe',
                'slug'        => 'adobe',
                'logo'        => 'adobe.png',
                'website'     => 'https://www.adobe.com',
                'description' => 'Creative software products.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Corel',
                'slug'        => 'corel',
                'logo'        => 'corel.png',
                'website'     => 'https://www.corel.com',
                'description' => 'Graphic design software.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Autodesk',
                'slug'        => 'autodesk',
                'logo'        => 'autodesk.png',
                'website'     => 'https://www.autodesk.com',
                'description' => 'CAD and engineering software.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Kaspersky',
                'slug'        => 'kaspersky',
                'logo'        => 'kaspersky.png',
                'website'     => 'https://www.kaspersky.com',
                'description' => 'Cybersecurity solutions.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Nitro',
                'slug'        => 'nitro',
                'logo'        => 'nitro.png',
                'website'     => 'https://www.gonitro.com',
                'description' => 'Professional PDF editor and document productivity.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],

            [
                'name'        => 'Foxit',
                'slug'        => 'foxit',
                'logo'        => 'foxit.png',
                'website'     => 'https://www.foxit.com',
                'description' => 'PDF editor, eSign and document management.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],

            [
                'name'        => 'VMware',
                'slug'        => 'vmware',
                'logo'        => 'vmware.png',
                'website'     => 'https://www.vmware.com',
                'description' => 'Virtualization and cloud infrastructure solutions.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],

            [
                'name'        => 'Acronis',
                'slug'        => 'acronis',
                'logo'        => 'acronis.png',
                'website'     => 'https://www.acronis.com',
                'description' => 'Backup, disaster recovery and cyber protection.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],

            [
                'name'        => 'Bitdefender',
                'slug'        => 'bitdefender',
                'logo'        => 'bitdefender.png',
                'website'     => 'https://www.bitdefender.com',
                'description' => 'Endpoint security and antivirus solutions.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],

            [
                'name'        => 'ESET',
                'slug'        => 'eset',
                'logo'        => 'eset.png',
                'website'     => 'https://www.eset.com',
                'description' => 'Internet security and endpoint protection.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],

            [
                'name'        => 'SketchUp',
                'slug'        => 'sketchup',
                'logo'        => 'sketchup.png',
                'website'     => 'https://www.sketchup.com',
                'description' => '3D modeling and visualization software.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],

            [
                'name'        => 'Veeam',
                'slug'        => 'veeam',
                'logo'        => 'veeam.png',
                'website'     => 'https://www.veeam.com',
                'description' => 'Enterprise backup and recovery solutions.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],

            [
                'name'        => 'JetBrains',
                'slug'        => 'jetbrains',
                'logo'        => 'jetbrains.png',
                'website'     => 'https://www.jetbrains.com',
                'description' => 'Professional IDEs and developer tools.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],

            [
                'name'        => 'TeamViewer',
                'slug'        => 'teamviewer',
                'logo'        => 'teamviewer.png',
                'website'     => 'https://www.teamviewer.com',
                'description' => 'Remote access and remote support software.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('brands')->insertBatch($data);
    }
}
