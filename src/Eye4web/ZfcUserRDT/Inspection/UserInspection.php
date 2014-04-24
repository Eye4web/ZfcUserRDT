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

namespace Eye4web\ZfcUserRDT\Inspection;

use ZfcUser\Entity\UserInterface;
use Zend\Stdlib\Hydrator\ClassMethods;
use Roave\DeveloperTools\Inspection\InspectionInterface;

/**
 * Inspection that stores a user and it's hydrator
 */
class UserInspection implements InspectionInterface
{
    /**
     * @var \ZfcUser\Entity\UserInterface
     */
    protected $user;
    
    protected $userHydrator;
    
    /**
     * @param UserInterface $user
     */
    public function __construct(UserInterface $user, $userHydrator)
    {
        $user = clone $user;
        $user->setPassword('hidden');
        $this->user = $user;
        $this->userHydrator = $userHydrator;
    }

    /**
     * {@inheritDoc}
     */
    public function serialize()
    {
        return serialize($this->userHydrator->extract($this->user));
    }

    /**
     * {@inheritDoc}
     */
    public function unserialize($serialized)
    {
        $this->userHydrator->hydrate(unserialize($serialized), $this->user);
    }

    /**
     * {@inheritDoc}
     */
    public function getInspectionData()
    {
        return [
            'user' => $this->user,
            'hydrator' => $this->userHydrator
        ];
    }
}
