<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_products', function (Blueprint $table) {

            $table->increments('id');
            /* increments()で作ったカラムには裏でunsined（符号無し・整数のみ）属性が付与 */
            $table->string('product_name')->length(64);
            $table->integer('category_id')->unsigned()->index();
            /* インデックス作成でテーブルとは別に検索用に最適化された状態で必要なデータだけがテーブルとは別に保持、アクセス速度上昇 */
            $table->integer('price')->unsigned()->index();
            /* 「UNSIGNED」属性、0と正の整数のみを扱う。データ量が二倍になる */
            $table->string('description')->length(256);
            $table->integer('sale_status_id')->unsigned()->index();
            $table->integer('product_status_id')->unsigned()->index();
            $table->timestamp('regist_data');
            $table->integer('user_id')->unsigned()->index();
            $table->char('delete_flag',1);
            /* 外部キー制約。他のテーブルのデータに参照（依存）するようにカラムにつける制約 */
            $table->foreign('sale_status_id')->references('id')->on('m_sales_statuses')->onDelete('cascade');
            $table->foreign('product_status_id')->references('id')->on('m_products_statuses')->onDelete('cascade');
            /* CASCADE=親テーブルのレコードに対し、削除または更新を行うと、子テーブル内で同じ値を持つカラムのデータに対して削除または更新を行う */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_products');
    }
}
