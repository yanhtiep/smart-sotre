<?php namespace App\Composers\UserComposers;

use Illuminate\View\View;
// use FWTA\Article\Repositories\ArticleRepository as Article;

use App\Modules\RESTfulAPI\Index\Controllers\IndexController as API_IndexController;
class UserComposers {

  private $api_index;

  public function __construct(API_IndexController $api_index_controller)
  {
      $this->api_index = $api_index_controller;
  }
  
  public function compose(View $view)
    {
        $id = Auth::user()->id;
        // $user = json_decode($this->api_index->show($id),true);

        // if ($user['code'] == 1){
        //   $duser = $user['data'];
        // }

        $view->with('datauser','kkkd');
    }

}