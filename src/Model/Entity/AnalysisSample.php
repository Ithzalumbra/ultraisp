<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AnalysisSample Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date
 * @property float $temperatureSample
 * @property int $quantitySample
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class AnalysisSample extends Entity
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
        'date' => true,
        'temperatureSample' => true,
        'quantitySample' => true,
        'user_id' => true,
        'user' => true
    ];
}
