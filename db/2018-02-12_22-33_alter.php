<?php
require_once(dirname(__FILE__). '/../vendor/autoload.php');

use Libraries\ApplicationRecord;

$model = new ApplicationRecord;

/* --------------------------
  タグテーブル作成、雑誌とタグの多対多テーブル作成
----------------------------- */
$model->begin();
try{
    $sql = "ALTER TABLE magazines.tags ADD UNIQUE (name); ";

    if ($model->execute($sql) !== false ){ print $sql."\n"; }

    if ($model->commit()) {
        print "コミット完了\n";
    }

}catch(Exception $e){
    print $e;
    $model->rollback();
}
?>