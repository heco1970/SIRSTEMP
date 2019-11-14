<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\TypesTable|\Cake\ORM\Association\BelongsTo $Types
 * @property |\Cake\ORM\Association\HasMany $Accesses
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Types', [
            'foreignKey' => 'type_id'
        ]);
        $this->hasMany('Accesses', [
            'foreignKey' => 'user_id'
        ]);
        
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'photo' => [
              'nameCallback' => function ($table, $entity, $data, $field, $settings) {
                $extension = pathinfo($data['name'], PATHINFO_EXTENSION);
                $valid = false;
                do {
                    $name = sha1(microtime(true) . mt_rand(10000, 900000)) . '.' . $extension;
                    if (!file_exists(WWW_ROOT . 'files' . DS . 'Users' . DS . 'photo' . DS . $name)) {
                        $valid = true;
                    }
                } while (!$valid);
                return $name;
              },
              'transformer' =>  function ($table, $entity, $data, $field, $settings) {
                $size = new \Imagine\Image\Box(210, 210);
                $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                $imagine = new \Imagine\Gd\Imagine();
                
                $extension = pathinfo($data['name'], PATHINFO_EXTENSION);
                $tmp = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;
                $imagine->open($data['tmp_name'])->thumbnail($size, $mode)->save($tmp);
                return [
                    $data['tmp_name'] => $data['name'],
                    $tmp => $data['name'],
                ];
              }
            ],
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('username')
            ->maxLength('username', 50)
            ->requirePresence('username', 'create')
            ->notEmpty('username', __('The username cannot be empty'));
        
        $validator
            ->scalar('password_old')
            ->maxLength('password_old', 255)
            ->notEmpty('password_old', __('The password cannot be empty'));

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->notEmpty('password', __('The password cannot be empty'))
            ->minLength('password',6, __('The password needs to have at least 6 characters'));
        
        $validator
            ->scalar('password_confirm')
            ->maxLength('password_confirm', 255)
            ->notEmpty('password_confirm', __('The password cannot be empty'));
        
        $validator
            ->sameAs('password_confirm','password',__('Passwords did\'t match'));

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name', __('The name cannot be empty'));

        $validator
            ->email('email', true, __('The email is not valid'))
            ->requirePresence('email', 'create')
            ->notEmpty('email', __('The email cannot be empty'));
        
        $validator
            ->requirePresence('type_id', 'create')
            ->notEmpty('type_id', __('The type cannot be empty'));
        
        $validator->setProvider('upload', \Josegonzalez\Upload\Validation\DefaultValidation::class);
        
        
        $validator->add('photo', 'fileAboveMinHeight', [
            'rule' => ['isAboveMinHeight', 210],
            'message' => __('This image should at least be 210px high'),
            'provider' => 'upload'
        ]);

        $validator->allowEmpty('photo');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username'], __('The username already exists')));
        $rules->add($rules->isUnique(['email']), __('The email already exists'));
        $rules->add($rules->existsIn(['type_id'], 'Types'));

        return $rules;
    }
    
    public function getName($id){
      $user = $this->get($id);
      
      return $user->name;
    }
}
