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
    protected $userData;
    protected $userHydratorClass;
    protected $userClass;
    
    /**
     * @param UserInterface $user
     */
    public function __construct($userData, $userClass, $userHydratorClass)
    {
        $this->userData = $userData;
        $this->userHydratorClass = $userHydratorClass;
        $this->userClass = $userClass;
    }

    /**
     * {@inheritDoc}
     */
    public function serialize()
    {
        return serialize([
            'userData' => $this->userData,
            'userHydratorClass' => $this->userHydratorClass,
            'userClass' => $this->userClass
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function unserialize($serialized)
    {
        $data = unserialize($serialized);
        $this->userHydratorClass = $data['userHydratorClass'];
        $this->userClass = $data['userClass'];
        $this->userData = $data['userData'];
    }

    /**
     * {@inheritDoc}
     */
    public function getInspectionData()
    {
        return [
            'userData' => $this->userData,
            'userClass' => $this->userClass,
            'userHydratorClass' => $this->userHydratorClass
        ];
    }
}
