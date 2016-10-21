<?php
namespace Home\Controller;
use Home\Controller;
class CooperationsController extends BaseController {

	//首页
    public function cooperations(){
        $Article=M('Article');
        $article=$Article->getByArticle_type(15);
        $article['content']=htmlspecialchars_decode($article['content']);

        $this->assign('article',$article);

        $this->display();
    }

}