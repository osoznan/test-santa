<?php

namespace App\Http\Repositories;

use App\Models\OrderItem;
use App\Models\SecretSantaMember;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class MainRepository {

    public static function getOrderItemsData(string|null $where = null): Collection {
        return OrderItem::query()->select([
                'users.id as user_id',
                'users.name as user_name',
                'orders.id as order_id',
                'order_items.id as order_items_id',
                'order_items.name as order_item_name',
                'orders.created_at as order_created_at'
            ])->leftJoin('orders', 'orders.id', '=', 'order_items.order_id')
            ->leftJoin('users', 'users.id', '=', 'orders.user_id')
            ->get();
    }

    /**
     * info about a given user (a santa) and his child user
     */
    public static function getSantaMemberData(int $userId): Model|null {
        return SecretSantaMember::query()->select([
                'santa.id as santa_id',
                'santa.name as santa_name',
                'child.id as child_id',
                'child.name as child_name'
            ])->leftJoin('users as santa', 'user_id', '=', 'santa.id')
            ->leftJoin('users as child', 'child_id', '=', 'child.id')
            ->find($userId);
    }

    /**
     * cascade deletion of all user's data with given user id
     */
    public static function deleteUser(int $userId): bool|null {
        $user = User::query()->find($userId);

        if ($user) {
            return $user->delete();
        }

        return null;
    }

}
