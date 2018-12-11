<?php
namespace App\Transformers;

use App\Models\Article;
use App\User;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
    # 定义include可使⽤的字段  压入2个相应字段 post接口测试不能检测
    #  微信开发者工具可以 （小程序中代码压入一个include属性并赋予对应字段，所以可以调用$availableIncludes）
    protected $availableIncludes =['category','user'];
//    转换 即返回哪些字段
    public function transform(Article $article){
        return [
            'id' => $article['id'],
            'title' => $article['title'],
            'content'=>$article['content'],
//            'created_at' => $article->created_at->toDateTimeString()
            'created_at' => $article->created_at->format('Y-m-d')
        ];
    }
    public function includeCategory(Article $article){
//        取出符合CategoryTransformer的Category表一条数据
        return $this->item($article->category,new CategoryTransformer());
    }
    public function includeUser(Article $article){
        return $this->item($article->user,new UserTransformer());
    }
}
