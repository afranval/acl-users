<?php
use Phinx\Seed\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'role_id'        => 2, // role guest type
                'username'      => $faker->userName,
                'password'      => (new DefaultPasswordHasher)->hash('test'),
                'email'         => $faker->email,
                'created'       => date('Y-m-d H:i:s'),
                'modified'      => date('Y-m-d H:i:s'),
            ];
        }

        $data[] = [
            'role_id'        => 1, // role admin type
            'username'      => 'admin',
            'password'      => (new DefaultPasswordHasher)->hash('admin'),
            'email'         => 'admin@admin.com',
            'created'       => date('Y-m-d H:i:s'),
            'modified'      => date('Y-m-d H:i:s'),
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
