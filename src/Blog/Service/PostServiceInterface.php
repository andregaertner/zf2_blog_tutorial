<?php
// Filename: /module/Blog/src/Blog/Service/PostServiceInterface.php
// http://framework.zend.com/manual/current/en/in-depth-guide/review.html
// http://framework.zend.com/manual/current/en/in-depth-guide/zend-form-zend-form-fieldset.html
namespace Blog\Service;

use Blog\Model\PostInterface;

interface PostServiceInterface
{
	/**
	 * Should return a set of all blog posts that we can iterate over. Single entries of the array are supposed to be
	 * implementing \Blog\Model\PostInterface
	 *
	 * @method findAllPosts
	 * @return array|PostInterface[]
	 */
	public function findAllPosts();

	/**
	 * Should return a single blog post
	 *
	 * @method findPost
	 * @param  int $id Identifier of the Post that should be returned
	 * @return PostInterface
	 */
	public function findPost($id);
	
	
	/**
	  * Should save a given implementation of the PostInterface and return it. If it is an existing Post the Post
      * should be updated, if it's a new Post it should be created.
      * @param PostInterface $postObject
      *
	  * @method savePost
      * @param PostInterface $postObject
      * @return PostInterface
      * @throws \Exception
      */  
	public function savePost(PostInterface $post);
	
	
	/**
	 * Should delete a given implementation of the PostInterface and return true if the deletion has been
	 * successful or false if not.
	 *
	 * @param  PostInterface $blog
	 * @return bool
	 */
	public function deletePost(PostInterface $blog);

}