<?php

namespace App\Repositories;

interface BaseInterface{
    
    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all();

    /**
     * Get's a post by it's ID
     *
     * @param int
     */
    public function find($id);


    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($id);

    /**
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update(array $data, $id);

}