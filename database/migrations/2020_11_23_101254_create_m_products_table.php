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
            /* Eloquent にデフォルトで設定されている主キー（Primary Key）はid。主キーを変更する：$primaryKey idを無効にして他のものを主キーとして設定できる。 */
            /* Eloquent ORMでは主キーに対する規約を設けている。①符号なしINT (unsigned int)②フィールド名はid③オートインクリメント */
            /* Laravel5.8 Eloquent：利用の開始 主キー Eloquentは更にテーブルの主キーがidというカラム名であると想定しています。この規約をオーバーライドする場合は、protectedのprimaryKeyプロパティを定義してください。 */
            $table->increments('product_id');
            /* increments()で作ったカラムには裏でunsined（符号無し・整数のみ）属性が付与される auto_increment を有効にすると自動で primarykey付与  */
            /* 1テーブルに対しAUTO_INCREMENTカラム1つのみ。セカンダリーインデックス，またはユニークキーがあるカラムに対して有効。プライマリキー以外でも可 */
            $table->string('product_name')->length(64);
            $table->integer('category_id')->unsigned()->index();
            /* インデックスを作成することでテーブルとは別に検索用に最適化された状態で必要なデータだけがテーブルとは別に保持される。なのでデータ追加時の処理が重くなるというデメリットもある */
            $table->integer('price')->unsigned()->index();
            /* 「UNSIGNED」属性を付加すると、0と正の整数のみを扱う。通常では負の数をカウントするために使用される格納域がより大きな正の整数をカウントするために使用できるようになり、同じバイト数でより大きな正の整数値を記録できる。 */
            $table->string('description')->length(256);
            /* string=varcharタイプ。可変長文字列のことを指す。varchar(m)という形で指定 mはバイト数。0~65535まで char型と異なり、末尾に空白は付かない。・末尾に空白が付いた文字列は
            そのまま格納される。メリット:指定された分だけメモリに格納されるため、効率がいい。デメリット:文字数が値ごとに違うため、処理は遅く不定となる */
            $table->integer('sale_status_id')->unsigned()->index();;
            $table->integer('product_status_id')->unsigned()->index();;
            $table->timestamp('regist_data');
            $table->integer('user_id')->unsigned()->index();
            $table->char('delete_flag')->length(1);
            /* ・固定長文字列のことを指す。・char(m)という形で指定する。mは文字数。0~255まで。・charcter(m)の略。・指定した文字数以下の文字を格納した時、文字列末尾
            に必要な分の空白を付け加えて指定の長さの文字列として格納するメリット:文字数が固定のため、処理が早く一定。デメリット:文字数が必ず定まった分格納されるため、メモリを圧迫しやすい。 */

            /* 外部キー制約とは他のテーブルのデータに参照（依存）するようにカラムにつける制約のこと。参照されるのが親テーブル参照するのが子テーブルと呼ぶ。 */
            /* 主キーと外部キーはRDBにとって、それぞれのテーブルを関連付けるために使用するとても大切な機能。主キーと外部キーを使った制約で利用した場合、下記の制限が入る
            1. 存在しない値を外部キーとして登録することはできない 2. 子テーブルの外部キーに値が登録されている親テーブルのレコードは削除できない */
            $table->foreign('sale_status_id')->references('sale_status_id')->on('m_sales_statuses')->onDelete('cascade');
            $table->foreign('product_status_id')->references('product_status_id')->on('m_products_statuses')->onDelete('cascade');
            /* CASCADE=親テーブルのレコードに対し、削除または更新を行うと、子テーブル内で同じ値を持つカラムのデータに対して削除または更新を行う */
            /* RESTRICT=親テーブルのレコードに対し、削除または更新を行うとエラーとなる。設定を省略した場合 RESTRICT が設定される */
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
