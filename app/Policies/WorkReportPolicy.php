<?php

namespace App\Policies;

use App\Models\Pegawai;
use App\Models\WorkReport;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkReportPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(Pegawai $user, WorkReport $workReport)
    {
        return $user->id === $workReport->pegawai_id;
    }
    public function delete(Pegawai $user, WorkReport $workReport)
    {
        // Check if the pegawai is the owner of the work report
        return $user->id === $workReport->pegawai_id;
    }
}
