<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AnalysisResult Entity
 *
 * @property int $ppm
 * @property \Cake\I18n\FrozenDate $date_register
 * @property bool $status
 * @property int $user_id
 * @property int $analysisSamples_id
 * @property int $analysisType_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\AnalysisSample $analysis_sample
 * @property \App\Model\Entity\AnalysisType $analysis_type
 */
class AnalysisResult extends Entity
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
        'ppm' => true,
        'date_register' => true,
        'status' => true,
        'user_id' => true,
        'user' => true,
        'analysis_sample' => true,
        'analysis_type' => true
    ];
}
