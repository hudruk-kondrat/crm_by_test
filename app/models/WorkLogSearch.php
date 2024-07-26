<?php

namespace app\models;

use app\components\RbacItems;
use app\models\WorkLog;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * WorkLogSearch represents the model behind the search form of `app\models\WorkLog`.
 */
class WorkLogSearch extends WorkLog
{
    /**
     * {@inheritdoc}
     */
    public $user;
    public $lead;
    public $leadStatus;
    public $stagesTransactions;

    public function rules()
    {
        return [
            [['id', 'lead_id', 'user_id', 'lead_status_id', 'stages_transactions_id'], 'integer'],
            [['date', 'products','user','lead','leadStatus','stagesTransactions'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        if(Yii::$app->user->can(RbacItems::ROLE_ADMIN)) {
            $query = WorkLog::find();
        } else {
            $query = WorkLog::find()->where(['user_id'=>\Yii::$app->user->id]);
        }


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=> array('pageSize'=>10),
        ]);


        $dataProvider->setSort(
            [
                'attributes' => ['date', 'user', 'lead','leadStatus','stagesTransactions']
            ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('user');
        $query->joinWith('lead');
        $query->joinWith('leadStatus');
        $query->joinWith('stagesTransactions');


        $dataProvider->sort->attributes['user'] = [
            'asc' => ['user.login' => SORT_ASC],
            'desc' => ['user.login' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['lead'] = [
            'asc' => ['lead.name' => SORT_ASC],
            'desc' => ['lead.name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['leadStatus'] = [
            'asc' => ['lead_status.name' => SORT_ASC],
            'desc' => ['lead_status.name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['stagesTransactions'] = [
            'asc' => ['stages_transactions.name' => SORT_ASC],
            'desc' => ['stages_transactions.name' => SORT_DESC],
        ];

// category здесь это название таблицы или алиаса
        $query->andFilterWhere(['like', 'user.login', $this->user])
            ->andFilterWhere(['like', 'lead_status.name', $this->leadStatus])
            ->andFilterWhere(['like', 'stages_transactions.name', $this->stagesTransactions])
        ->andFilterWhere(['like', 'lead.name', $this->lead]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
        ]);


        $query->andFilterWhere(['like', 'products', $this->products]);

        return $dataProvider;
    }
}
