<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $rut
 * @property string $name
 * @property string $password
 * @property string $address
 * @property string $email
 * @property int $usertype_id
 *
 * @property \App\Model\Entity\Usertype $usertype
 * @property \App\Model\Entity\Analysissample[] $analysissamples
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'rut' => true,
        'name' => true,
        'password' => true,
        'address' => true,
        'email' => true,
        'usertype_id' => true,
        'usertype' => true,
        'analysissamples' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
