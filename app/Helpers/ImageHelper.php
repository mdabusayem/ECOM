<?php
namespace App\Helpers;
use App\User;
use App\Helpers\GravatarHelper;

/**
 * 
 */
class ImageHelper
{
	
	public static function getUserImage($id)
	{

		$user=User::find($id);
		
		//print_r($user);
		//echo $id;exit();
		$avatar_url="";
		if (!is_null($user)) {
			if ($user->avatar==NULL) {
				if (GravatarHelper::validate_gravatar($user->email)) {

					$avatar_url=GravatarHelper::gravatar_image($user->email,40);
				}else{
					/*$hash=md5($user->email);
		return 'www.gravatar.com/avatar/'. $hash ;*/
		$avatar_url=url('images/defaults/user.png');

				}
			}else{
				$avatar_url=url('images/users/'.$user->avatar);

			}
		}else{

		}
		return $avatar_url;
	}
}


?>