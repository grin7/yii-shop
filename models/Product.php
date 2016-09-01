<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $product_id
 * @property string $product_name
 *
 * @property Image[] $images
 * @property ProdCat[] $prodCats
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name'], 'required'],
            [['product_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_name' => 'Product Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdCats()
    {
        return $this->hasMany(ProdCat::className(), ['product_id' => 'product_id']);
    }
    
    public function extraFields()
    {
        return ['images'];
    }
    
    static function getProductDetails($id)
    {
        $query = "SELECT product_name, image_name, category_name, sub_category_name FROM product "
                . "JOIN image ON product.product_id=image.product_id "
                . "JOIN prod_cat ON product.product_id=prod_cat.product_id "
                . "JOIN category ON prod_cat.category_id=category.category_id "
                . "JOIN sub_category ON category.category_id=sub_category.category_id "
                . "WHERE product.product_id='{$id}'";
                
        return Yii::$app->db->createCommand($query)->queryOne();
    }
}
