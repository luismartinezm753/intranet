<?php
/**
 * Created by PhpStorm.
 * User: l_mar
 * Date: 16-02-2017
 * Time: 14:51
 */
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class SendMailForm extends Form
{

    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('header', 'string')
            ->addField('sendto', ['type' => 'string'])
            ->addField('message', ['type' => 'text'])
            ->addField('submittedfile',['type'=>'file']);
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator
            ->notEmpty('header','Debe agregar un título.')
            ->notEmpty('sendto','Debe seleccionar al menos un destinatario.')
            ->notEmpty('message','El mensaje no puede ser vacio.')
            ->add('submittedfile','extension',['rule'=>['extension','pdf','doc','png','jpg']])
            ->add('submittedfile','size',['rule'=>['fileSize','5MB']])
            ->allowEmpty('submittedfile');
    }

    protected function _execute(array $data)
    {
        $this->sendEmailTo($data);
        return true;
    }

    public function sendEmailTo($data){
        $sendto=$data['sendto'];
        foreach ($sendto as $key=>$value){
            if ($value<0){
                $this->sendEmailGroup($data);
            }else{
                $user=$this->Users->get($value);
                $email = new Email();
                $email->transport('mailjet');
                $email->emailFormat('html');
                $email->from(['kenpo.martinez@gmail.com'=>'Kenpo Martinez'])
                    ->to([$user['email'] => 'My Website'])
                    ->subject($data['header'])
                    ->send($data['message']);
            }
        }
    }

    public function sendEmailGroup($data){
        $group=$data['sendto'];
        if ($group==0){
            $users=$this->Users->find();
        }else{
            $users=$this->Users->find()->where(['role_id ='=>abs($group)]);
        }
        foreach ($users as $user){
            $email = new Email();
            $email->transport('mailjet');
            $email->emailFormat('html');
            $email->from(['kenpo.martinez@gmail.com'=>'Kenpo Martinez'])
                ->to([$user['email'] => 'My Website'])
                ->subject($data['header'])
                ->send($data['message']);
        }
    }
}