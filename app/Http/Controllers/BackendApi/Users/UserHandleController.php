<?php

namespace App\Http\Controllers\BackendApi\Users;

use App\Http\Controllers\BackendApi\BackEndApiMainController;
use App\Http\Requests\Backend\Users\UserHandleApplyResetUserFundPasswordRequest;
use App\Http\Requests\Backend\Users\UserHandleApplyResetUserPasswordRequest;
use App\Http\Requests\Backend\Users\UserHandleBankCardListRequest;
use App\Http\Requests\Backend\Users\UserHandleCommonAuditPasswordRequest;
use App\Http\Requests\Backend\Users\UserHandleCreateUserRequest;
use App\Http\Requests\Backend\Users\UserHandleDeactivateDetailRequest;
use App\Http\Requests\Backend\Users\UserHandleDeactivateRequest;
use App\Http\Requests\Backend\Users\UserHandleDeductionBalanceRequest;
use App\Http\Requests\Backend\Users\UserHandleSetUserAvatarRequest;
use App\Http\Requests\Backend\Users\UserHandleUserAccountChangeRequest;
use App\Http\Requests\Backend\Users\UserHandleUserRechargeHistoryRequest;
use App\Http\Requests\Backend\Users\UserHandleDeleteBankCardRequest;
use App\Http\SingleActions\Backend\Users\UserHandleBankCardListAction;
use App\Http\SingleActions\Backend\Users\UserHandleCommonAppliedPasswordHandleAction;
use App\Http\SingleActions\Backend\Users\UserHandleCommonAuditPasswordAction;
use App\Http\SingleActions\Backend\Users\UserHandleCommonHandleUserPasswordAction;
use App\Http\SingleActions\Backend\Users\UserHandleCreateUserAction;
use App\Http\SingleActions\Backend\Users\UserHandleDeactivateAction;
use App\Http\SingleActions\Backend\Users\UserHandleDeactivateDetailAction;
use App\Http\SingleActions\Backend\Users\UserHandleDeductionBalanceAction;
use App\Http\SingleActions\Backend\Users\UserHandlePublicAvatarAction;
use App\Http\SingleActions\Backend\Users\UserHandleSetUserAvatarAction;
use App\Http\SingleActions\Backend\Users\UserHandleUserAccountChangeAction;
use App\Http\SingleActions\Backend\Users\UserHandleUserRechargeHistoryAction;
use App\Http\SingleActions\Backend\Users\UserHandleUsersInfoAction;
use App\Http\SingleActions\Backend\Users\UserHandleDeleteBankCardAction;
use Illuminate\Http\JsonResponse;

class UserHandleController extends BackEndApiMainController
{
    public $withNameSpace = 'Admin\BackendAdminAuditPasswordsList';

    /**
     * ?????????????????????????????????????????????
     * @return JsonResponse
     */
    public function getUserPrizeGroup(): JsonResponse
    {
        $data['min'] = $this->minClassicPrizeGroup; //???????????????
        $data['max'] = $this->maxClassicPrizeGroup; //???????????????
        return $this->msgOut(true, $data);
    }

    /**
     * ????????????????????????????????????????????????
     * @param  UserHandleCreateUserRequest $request
     * @param  UserHandleCreateUserAction  $action
     * @return JsonResponse
     */
    public function createUser(UserHandleCreateUserRequest $request, UserHandleCreateUserAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ????????????????????????????????????
     * @param  UserHandleUsersInfoAction  $action
     * @return JsonResponse
     */
    public function usersInfo(UserHandleUsersInfoAction $action): JsonResponse
    {
        return $action->execute($this);
    }

    /**
     * ????????????????????????
     * @param  UserHandleApplyResetUserPasswordRequest $request
     * @return JsonResponse
     */
    public function applyResetUserPassword(
        UserHandleApplyResetUserPasswordRequest $request,
        UserHandleCommonHandleUserPasswordAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $this->commonHandleUserPassword($inputDatas, $action, 1);
    }

    /**
     * ??????????????????
     * @param  UserHandleApplyResetUserFundPasswordRequest $request
     * @return JsonResponse
     */
    public function applyResetUserFundPassword(
        UserHandleApplyResetUserFundPasswordRequest $request,
        UserHandleCommonHandleUserPasswordAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $this->commonHandleUserPassword($inputDatas, $action, 2);
    }

    /**
     * ???????????????????????????????????????
     * @param  array  $inputDatas
     * @param  object $action
     * @param  int    $type todo if type new added then should notice on error message
     * @return JsonResponse
     */
    public function commonHandleUserPassword($inputDatas, $action, $type): JsonResponse
    {
        return $action->execute($this, $inputDatas, $type);
    }

    /**
     * ??????????????????????????????
     * @return JsonResponse
     */
    public function appliedResetUserPasswordLists(UserHandleCommonAppliedPasswordHandleAction $action): JsonResponse
    {
        return $this->commonAppliedPasswordHandle($action);
    }

    /**
     * ?????????????????????????????????
     * @return JsonResponse
     */
    public function appliedResetUserFundPasswordLists(UserHandleCommonAppliedPasswordHandleAction $action): JsonResponse
    {
        return $this->commonAppliedPasswordHandle($action);
    }

    /**
     * ?????????????????????????????????????????????
     * @param  UserHandleCommonAppliedPasswordHandleAction $action
     * @return JsonResponse
     */
    private function commonAppliedPasswordHandle($action): JsonResponse
    {
        return $action->execute($this);
    }

    /**
     * @param  UserHandleCommonAuditPasswordRequest $request
     * @param  UserHandleCommonAuditPasswordAction  $action
     * @return JsonResponse
     */
    public function auditApplyUserPassword(
        UserHandleCommonAuditPasswordRequest $request,
        UserHandleCommonAuditPasswordAction $action
    ): JsonResponse {
        return $this->commonAuditPassword($request, $action);
    }

    /**
     * @param  UserHandleCommonAuditPasswordRequest $request
     * @param  UserHandleCommonAuditPasswordAction  $action
     * @return JsonResponse
     */
    public function auditApplyUserFundPassword(
        UserHandleCommonAuditPasswordRequest $request,
        UserHandleCommonAuditPasswordAction $action
    ): JsonResponse {
        return $this->commonAuditPassword($request, $action);
    }

    /**
     * @param  object $request
     * @param  object $action
     * @return JsonResponse
     */
    public function commonAuditPassword($request, $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ????????????????????????
     * @param  UserHandleDeactivateRequest $request
     * @param  UserHandleDeactivateAction  $action
     * @return JsonResponse
     */
    public function deactivate(UserHandleDeactivateRequest $request, UserHandleDeactivateAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ??????????????????
     * @param  UserHandleDeactivateDetailRequest $request
     * @param  UserHandleDeactivateDetailAction  $action
     * @return JsonResponse
     */
    public function deactivateDetail(
        UserHandleDeactivateDetailRequest $request,
        UserHandleDeactivateDetailAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ??????????????????
     * @param  UserHandleUserAccountChangeRequest $request
     * @param  UserHandleUserAccountChangeAction  $action
     * @return JsonResponse
     */
    public function userAccountChange(
        UserHandleUserAccountChangeRequest $request,
        UserHandleUserAccountChangeAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ??????????????????
     * @param  UserHandleUserRechargeHistoryRequest $request
     * @param  UserHandleUserRechargeHistoryAction  $action
     * @return JsonResponse
     */
    public function userRechargeHistory(
        UserHandleUserRechargeHistoryRequest $request,
        UserHandleUserRechargeHistoryAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ????????????????????????
     * @param  UserHandleDeductionBalanceRequest $request
     * @param  UserHandleDeductionBalanceAction  $action
     * @return JsonResponse
     */
    public function deductionBalance(
        UserHandleDeductionBalanceRequest $request,
        UserHandleDeductionBalanceAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ?????????????????????
     * @param  UserHandleBankCardListRequest $request
     * @param  UserHandleBankCardListAction  $action
     * @return JsonResponse
     */
    public function bankCardList(
        UserHandleBankCardListRequest $request,
        UserHandleBankCardListAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * @param UserHandleDeleteBankCardRequest $request
     * @param UserHandleDeleteBankCardAction $action
     * @return JsonResponse
     */
    public function deleteBankCard(
        UserHandleDeleteBankCardRequest $request,
        UserHandleDeleteBankCardAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ??????????????????????????????
     * @param  UserHandlePublicAvatarAction $action
     * @return JsonResponse
     */
    public function publicAvatar(UserHandlePublicAvatarAction $action): JsonResponse
    {
        return $action->execute($this);
    }
    /**
     * ??????????????????
     * @param  UserHandleSetUserAvatarRequest $request
     * @param  UserHandleSetUserAvatarAction $action
     * @return JsonResponse
     */
    public function setUserAvatar(
        UserHandleSetUserAvatarRequest $request,
        UserHandleSetUserAvatarAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }
}
