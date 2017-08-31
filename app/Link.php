<?php
namespace App;

use Illuminate\Database\Eloquent\Model;



class Link extends Model {
  protected $table = 'links';
//  protected $fillable = array('url','hash','user_id');
	protected $fillable = ['url','hash','user_id'];
  public $timestamps = false;
	
	
//	protected $primaryKey = 'user';

		public function users() 
		{
			return $this->belongsTo('App\User');
		}
}