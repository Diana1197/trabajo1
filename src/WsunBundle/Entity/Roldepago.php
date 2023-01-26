<?php

namespace WsunBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Roldepago
 *
 * @ORM\Table(name="roldepago", indexes={@ORM\Index(name="IDX_40E497EB664AF320", columns={"id_empleado"})})
 * @ORM\Entity
 */
class Roldepago
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="roldepago_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

     /**
     * @var datetime $fecha
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

     /**
     * @var datetime $fechaPag
     *
     * @ORM\Column(name="fecha_Pag", type="datetime")
     */
    private $fechaPag;

    /**
     * @var string
     *
     * @ORM\Column(name="sueldo_emp", type="string", length=255, nullable=true)
     */
    private $sueldoEmp;

    /**
     * @var string
     *
     * @ORM\Column(name="fondos_res", type="string", length=255, nullable=true)
     */
    private $fondosRes;
    
    /**
     * @var string
     *
     * @ORM\Column(name="decimo_ter", type="string", length=255, nullable=true)
     */
    private $decimoTer;

    /**
     * @var string
     *
     * @ORM\Column(name="decimo_cuar", type="string", length=255, nullable=true)
     */
    private $decimoCuar;


    /**
     * @var string
     *
     * @ORM\Column(name="aporte_iess", type="string", length=255, nullable=true)
     */
    private $aporteIess;
   
    /**
     * @var string
     *
     * @ORM\Column(name="quirografario_iess", type="string", length=255, nullable=true)
     */
    private $quirografarioIess;
   
    /**
     * @var string
     *
     * @ORM\Column(name="anticipo_tipoc", type="string", length=255, nullable=true)
     */
    private $anticipoTipoc;

    
    /**
     * @var string
     *
     * @ORM\Column(name="retencion_judicial", type="string", length=255, nullable=true)
     */
    private $retencionJud;

    
    /**
     * @var string
     *
     * @ORM\Column(name="prestamo_hipotecario", type="string", length=255, nullable=true)
     */
    private $prestamoHipo;

    
    /**
     * @var string
     *
     * @ORM\Column(name="otros_descuentos", type="string", length=255, nullable=true)
     */
    private $otrosDes;

    /**
     * @var string
     *
     * @ORM\Column(name="total_recibir", type="string", length=255, nullable=true)
     */
    private $totalRecibir;
   

    /**
     * @var \Roldepago
     *
     * @ORM\ManyToOne(targetEntity="Empleado", inversedBy="roldepago")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_empleado", referencedColumnName="id")
     * })
     */
    private $idEmpleado;
    
    
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set fecha
     *
     * @param string $fecha
     *
     * @return Roldepago
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return string
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set fechaPag
     *
     * @param string $fechaPag
     *
     * @return Roldepago
     */
    public function setFechaPag($fechaPag)
    {
        $this->fechaPag = $fechaPag;

        return $this;
    }

    /**
     * Get fechaPag
     *
     * @return string
     */
    public function getFechaPag()
    {
        return $this->fechaPag;
    }

     /**
     * Set sueldoEmp
     *
     * @param string $sueldoEmp
     *
     * @return Roldepago
     */
    public function setSueldoEmp($sueldoEmp)
    {
        $this->sueldoEmp = $sueldoEmp;

        return $this;
    }

    /**
     * Get sueldoEmp
     *
     * @return string
     */
    public function getSueldoEmp()
    {
        return $this->sueldoEmp;
    }

    /**
    * Set fondosRes
    *
    * @param string $fondosRes
    *
    * @return Roldepago
    */
   public function setFondosRes($fondosRes)
   {
       $this->fondosRes = $fondosRes;

       return $this;
   }

   /**
    * Get fondosRes
    *
    * @return string
    */
   public function getFondosRes()
   {
       return $this->fondosRes;
   }

    /**
     * Set decimoTer
     *
     * @param string $decimoTer
     *
     * @return Roldepago
     */
    public function setDecimoTer($decimoTer)
    {
        $this->decimoTer = $decimoTer;

        return $this;
    }

    /**
     * Get decimoTer
     *
     * @return string
     */
    public function getDecimoTer()
    {
        return $this->decimoTer;
    }


    /**
     * Set decimoCuar
     *
     * @param string $decimoCuar
     *
     * @return Roldepago
     */
    public function setDecimoCuar($decimoCuar)
    {
        $this->decimoCuar = $decimoCuar;

        return $this;
    }

    /**
     * Get decimoCuar
     *
     * @return string
     */
    public function getDecimoCuar()
    {
        return $this->decimoCuar;
    }


     /**
     * Set aporteIess
     *
     * @param string $aporteIess
     *
     * @return Roldepago
     */
    public function setAporteIess($aporteIess)
    {
        $this->aporteIess = $aporteIess;

        return $this;
    }

    /**
     * Get aporteIess
     *
     * @return string
     */
    public function getAporteIess()
    {
        return $this->aporteIess;
    }

     /**
     * Set quirografarioIess
     *
     * @param string $quirografarioIess
     *
     * @return Roldepago
     */
    public function setQuirografarioIess($quirografarioIess)
    {
        $this->quirografarioIess = $quirografarioIess;

        return $this;
    }

    /**
     * Get quirografarioIess
     *
     * @return string
     */
    public function getQuirografarioIess()
    {
        return $this->quirografarioIess;
    }
    
     /**
     * Set anticipoTipoc
     *
     * @param string $anticipoTipoc
     *
     * @return Roldepago
     */
    public function setAnticipoTipoc($anticipoTipoc)
    {
        $this->anticipoTipoc = $anticipoTipoc;

        return $this;
    }

    /**
     * Get anticipoTipoc
     *
     * @return string
     */
    public function getAnticipoTipoc()
    {
        return $this->anticipoTipoc;
    }

 
    /**
     * Set retencionJud
     *
     * @param string $retencionJud
     *
     * @return Roldepago
     */
    public function setRetencionJud($retencionJud)
    {
        $this->retencionJud = $retencionJud;

        return $this;
    }

    /**
     * Get retencionJud
     *
     * @return string
     */
    public function getRetencionJud()
    {
        return $this->retencionJud;
    }

      
        /**
     * Set prestamoHipo
     *
     * @param string $prestamoHipo
     *
     * @return Roldepago
     */
    public function setPrestamoHipo($prestamoHipo)
    {
        $this->prestamoHipo = $prestamoHipo;

        return $this;
    }

    /**
     * Get prestamoHipo
     *
     * @return string
     */
    public function getPrestamoHipo()
    {
        return $this->prestamoHipo;
    }


        /**
     * Set otrosDes
     *
     * @param string $otrosDes
     *
     * @return Roldepago
     */
    public function setOtrosDes($otrosDes)
    {
        $this->otrosDes = $otrosDes;

        return $this;
    }

    /**
     * Get otrosDes
     *
     * @return string
     */
    public function getOtrosDes()
    {
        return $this->otrosDes;
    }
    
     /**
     * Set totalRecibir
     *
     * @param string $totalRecibir
     *
     * @return Roldepago
     */
    public function setTotalRecibir($totalRecibir)
    {
        $this->totalRecibir = $totalRecibir;

        return $this;
    }

    /**
     * Get totalRecibir
     *
     * @return string
     */
    public function getTotalRecibir()
    {
        return $this->totalRecibir;
    }


    /**
     * Set idEmpleado
     *
     * @param \WsunBundle\Entity\Empleado $idEmpleado
     *
     * @return Roldepago
     */
    public function setIdEmpleado(\WsunBundle\Entity\Empleado $idEmpleado = null)
    {
        $this->idEmpleado = $idEmpleado;

        return $this;
    }

    /**
     * Get idEmpleado
     *
     * @return \WsunBundle\Entity\Empleado
     */
    public function getIdEmpleado()
    {
        return $this->idEmpleado;
    }
}
