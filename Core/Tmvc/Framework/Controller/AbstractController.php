<?php
/**
 *
 * @package     tmvc
 * @author      Codilar Technologies
 * @license     https://opensource.org/licenses/OSL-3.0 Open Software License v. 3.0 (OSL-3.0)
 * @link        http://www.codilar.com/
 */

namespace Tmvc\Framework\Controller;

use Tmvc\Framework\App\Request;
use Tmvc\Framework\App\Response;
use Tmvc\Framework\Exception\TmvcException;
use Tmvc\Framework\Tools\Url;
use Tmvc\Framework\View\View;

abstract class AbstractController
{
    /**
     * @var Context
     */
    private $context;

    /**
     * @var View
     */
    private $view;

    /**
     * @var Url
     */
    private $urlBuilder;

    /**
     * @var View/Response
     */
    private $dispatcher = null;

    /**
     * @var boolean
     */
    private $dispatched = false;

    /**
     * AbstractController constructor.
     * @param Context $context
     */
    public function __construct(
        Context $context
    )
    {
        $this->context = $context;
        $this->view = $this->context->getView();
        $this->urlBuilder = $this->context->getUrl();
    }

    /**
     * @return View
     */
    public function getView(): View
    {
        return $this->view;
    }

    /**
     * @param Request $request
     * @return View|Response
     * @throws TmvcException
     */
    abstract public function execute(Request $request);

    /**
     * @return Context
     */
    public function getContext(): Context
    {
        return $this->context;
    }

    /**
     * @return Url
     */
    public function getUrlBuilder(): Url
    {
        return $this->urlBuilder;
    }

    /**
     * @return bool
     */
    public function isDispatched(): bool
    {
        return $this->dispatched;
    }

    /**
     * @param bool $dispatched
     * @return $this
     */
    public function setDispatched(bool $dispatched)
    {
        $this->dispatched = $dispatched;
        return $this;
    }

    /**
     * @param View|Response $dispatcher
     * @return $this
     */
    public function setDispatcher($dispatcher)
    {
        $this->dispatcher = $dispatcher;
        return $this;
    }

    /**
     * @return View|Response
     */
    public function getDispatcher()
    {
        return $this->dispatcher;
    }
}