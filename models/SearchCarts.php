<?php


namespace app\models;


use yii\base\Model;
use Yii;

class SearchCarts extends Model
{
	public $key;
	public $category_id;
	public $inDescript;
	public $category;
	

	public function rules() 
	{
		return [
			[['key'], 'trim'],
			[['key'], 'required'],
			[['key'], 'string', 'length' => [3, 25]],
			[['category_id', 'inDescript', 'category'], 'integer'],
		];
	}

    public function simpleSearch()
    {
    	if ($this->validate()) {  

    		if($this->inDescript == 10) {

    			if($this->category_id == 1000) {
    				$sql = "SELECT * FROM cart WHERE status = 1 AND text LIKE '%$this->key%'";
    			} else {
    				$subcat = Subcategory::find()->where(['category_id' => $this->category_id])->all();
    		
    				if($subcat) {
    				$sql = "SELECT * FROM cart WHERE status = 1 AND subcategory_id IN (";
    				$sql2 = '';
    					foreach ($subcat as $item) {
    						$sql2 .= "'$item->id',";
    					}
    					$sql .= $sql2 = mb_substr($sql2, 0, -1);
    					$sql .= ") AND text LIKE '%$this->key%'";
    				}    		
    			
    			}       

    		} else {
    			$sql = "SELECT * FROM cart WHERE status = 1 AND title LIKE '%$this->key%'";
    		}

        return Yii::$app->db->createCommand($sql)->queryAll();
    	}
    }

}

