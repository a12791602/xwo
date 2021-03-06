<?php

namespace App\Http\Controllers\BackendApi\Game\Lottery;

use App\Http\Controllers\BackendApi\BackEndApiMainController;
use App\Http\Requests\Backend\Game\Lottery\LotteriesAddRequest;
use App\Http\Requests\Backend\Game\Lottery\LotteriesCalculateEncodeAgainRequest;
use App\Http\Requests\Backend\Game\Lottery\LotteriesDeleteIssuesRequest;
use App\Http\Requests\Backend\Game\Lottery\LotteriesDeleteRequest;
use App\Http\Requests\Backend\Game\Lottery\LotteriesEditMethodRequest;
use App\Http\Requests\Backend\Game\Lottery\LotteriesEditRequest;
use App\Http\Requests\Backend\Game\Lottery\LotteriesGenerateIssueRequest;
use App\Http\Requests\Backend\Game\Lottery\LotteriesInputCodeRequest;
use App\Http\Requests\Backend\Game\Lottery\LotteriesListsRequest;
use App\Http\Requests\Backend\Game\Lottery\LotteriesLotteriesSwitchRequest;
use App\Http\Requests\Backend\Game\Lottery\LotteriesMethodGroupSwitchRequest;
use App\Http\Requests\Backend\Game\Lottery\LotteriesMethodRowSwitchRequest;
use App\Http\Requests\Backend\Game\Lottery\LotteriesMethodSwitchRequest;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesAddAction;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesAllLotteriesListAction;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesCalculateEncodeAgainAction;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesDeleteAction;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesDeleteIssuesAction;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesEditAction;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesEditMethodAction;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesGenerateIssueAction;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesInputCodeAction;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesIssueListsAction;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesListsAction;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesLotteriesCodeLengthAction;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesLotteriesSwitchAction;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesMethodGroupSwitchAction;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesMethodListsAction;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesMethodRowSwitchAction;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesMethodSwitchAction;
use App\Http\SingleActions\Backend\Game\Lottery\LotteriesSeriesListsAction;
use Illuminate\Http\JsonResponse;
use App\Lib\BaseCache;

class LotteriesController extends BackEndApiMainController
{
    use BaseCache;

    public $redisKey = 'backend_lottery_method_list';
    public $lotteryIssueEloq = 'Game\Lottery\LotteryIssue'; //issueLists

    /**
     * ??????????????????
     * @param  LotteriesSeriesListsAction $action
     * @return JsonResponse
     */
    public function seriesLists(LotteriesSeriesListsAction $action): JsonResponse
    {
        return $action->execute($this);
    }

    /**
     * ??????????????????
     * @param  LotteriesListsRequest $request
     * @param  LotteriesListsAction  $action
     * @return JsonResponse
     */
    public function lists(LotteriesListsRequest $request, LotteriesListsAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ?????????????????????
     * @param  LotteriesMethodListsAction  $action
     * @return JsonResponse
     */
    public function methodLists(LotteriesMethodListsAction $action): JsonResponse
    {
        return $action->execute($this);
    }

    /**
     * ???????????????????????????
     * @param  LotteriesIssueListsAction  $action
     * @return JsonResponse
     */
    public function issueLists(LotteriesIssueListsAction $action): JsonResponse
    {
        return $action->execute($this);
    }

    /**
     * ????????????
     * @param  LotteriesGenerateIssueRequest $request
     * @param  LotteriesGenerateIssueAction  $action
     * @return JsonResponse
     */
    public function generateIssue(
        LotteriesGenerateIssueRequest $request,
        LotteriesGenerateIssueAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ????????????
     * @param  LotteriesLotteriesSwitchRequest $request
     * @param  LotteriesLotteriesSwitchAction  $action
     * @return JsonResponse
     */
    public function lotteriesSwitch(
        LotteriesLotteriesSwitchRequest $request,
        LotteriesLotteriesSwitchAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ???????????????
     * @param  LotteriesMethodGroupSwitchRequest $request
     * @param  LotteriesMethodGroupSwitchAction  $action
     * @return JsonResponse
     */
    public function methodGroupSwitch(
        LotteriesMethodGroupSwitchRequest $request,
        LotteriesMethodGroupSwitchAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ???????????????
     * @param  LotteriesMethodRowSwitchRequest $request
     * @param  LotteriesMethodRowSwitchAction  $action
     * @return JsonResponse
     */
    public function methodRowSwitch(
        LotteriesMethodRowSwitchRequest $request,
        LotteriesMethodRowSwitchAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ????????????
     * @param  LotteriesMethodSwitchRequest $request
     * @param  LotteriesMethodSwitchAction  $action
     * @return JsonResponse
     */
    public function methodSwitch(
        LotteriesMethodSwitchRequest $request,
        LotteriesMethodSwitchAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ??????????????????
     * @return void
     */
    public function clearMethodCache(): void
    {
        self::deleteTagsCache($this->redisKey);
    }

    /**
     * ????????????
     * @param  LotteriesEditMethodRequest $request
     * @param  LotteriesEditMethodAction  $action
     * @return JsonResponse
     */
    public function editMethod(
        LotteriesEditMethodRequest $request,
        LotteriesEditMethodAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ????????????
     * @param  LotteriesInputCodeRequest $request
     * @param  LotteriesInputCodeAction  $action
     * @return JsonResponse
     */
    public function inputCode(LotteriesInputCodeRequest $request, LotteriesInputCodeAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ??????????????????
     * @param  LotteriesLotteriesCodeLengthAction  $action
     * @return JsonResponse
     */
    public function lotteriesCodeLength(LotteriesLotteriesCodeLengthAction $action): JsonResponse
    {
        return $action->execute($this);
    }

    /**
     * ??????????????????
     * @param  LotteriesCalculateEncodeAgainRequest $request
     * @param  LotteriesCalculateEncodeAgainAction $action
     * @return JsonResponse
     */
    public function calculateEncodeAgain(
        LotteriesCalculateEncodeAgainRequest $request,
        LotteriesCalculateEncodeAgainAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ????????????
     * @param   LotteriesAddRequest $request
     * @param   LotteriesAddAction  $action
     * @return  JsonResponse
     */
    public function add(LotteriesAddRequest $request, LotteriesAddAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ????????????
     * @param  LotteriesEditRequest $request
     * @param  LotteriesEditAction  $action
     * @return JsonResponse
     */
    public function edit(LotteriesEditRequest $request, LotteriesEditAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ????????????
     * @param  LotteriesDeleteRequest $request
     * @param  LotteriesDeleteAction  $action
     * @return JsonResponse
     */
    public function delete(LotteriesDeleteRequest $request, LotteriesDeleteAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * ?????????????????????
     * @param  LotteriesAllLotteriesListAction $action
     * @return JsonResponse
     */
    public function allLotteriesList(LotteriesAllLotteriesListAction $action): JsonResponse
    {
        return $action->execute($this);
    }

    /**
     * ????????????
     * @param  LotteriesDeleteIssuesRequest $request
     * @param  LotteriesDeleteIssuesAction  $action
     * @return JsonResponse
     */
    public function deleteIssues(
        LotteriesDeleteIssuesRequest $request,
        LotteriesDeleteIssuesAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }
}
