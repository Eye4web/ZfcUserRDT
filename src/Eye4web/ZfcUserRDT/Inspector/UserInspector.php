<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace Eye4web\ZfcUserRDT\Inspector;

use Eye4web\ZfcUserRDT\Inspection\UserInspection;
use Zend\EventManager\EventInterface;
use Roave\DeveloperTools\Inspector\InspectorInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Authentication\AuthenticationServiceInterface;

/**
 * Inspector that captures the user for a given event
 */
class UserInspector implements InspectorInterface
{
    /**
     * @var \Zend\Stdlib\Hydrator\HydratorInterface
     */
    protected $userHydrator;

    /**
     * @var AuthenticationServiceInterface
     */
    protected $authService;
    
    public function __construct(AuthenticationServiceInterface $authService, HydratorInterface $userHydrator)
    {
        $this->authService = $authService;
        $this->userHydrator = $userHydrator;    
    }
    
    /**
     * {@inheritDoc}
     */
    public function inspect(EventInterface $event)
    {
        $user = $this->authService->getIdentity();
        return new UserInspection($this->userHydrator->extract($user), get_class($user), get_class($this->userHydrator));
    }
}
