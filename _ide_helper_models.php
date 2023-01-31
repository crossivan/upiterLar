<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Ritual
 *
 * @property int $id
 * @property int $user_id
 * @property int $order_number
 * @property int $size
 * @property string $shape
 * @property string $holes
 * @property int $cross
 * @property int $photo
 * @property string|null $epitaph
 * @property string|null $first_name
 * @property string|null $second_name
 * @property string|null $patronymic
 * @property string|null $birthday
 * @property string|null $day_of_death
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual newQuery()
 * @method static \Illuminate\Database\Query\Builder|Ritual onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual whereCross($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual whereDayOfDeath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual whereEpitaph($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual whereHoles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual whereSecondName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual whereShape($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ritual whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Ritual withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Ritual withoutTrashed()
 * @mixin \Eloquent
 */
	class IdeHelperRitual {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ritual[] $ceramics
 * @property-read int|null $ceramics_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

